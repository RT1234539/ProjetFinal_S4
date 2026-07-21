<?php
namespace App\Models;
use CodeIgniter\Model;

class GainsModel extends Model
{
    protected $table            = 'v_gains_complet';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $allowedFields    = [];
    protected $useTimestamps    = false;

    public function getGainsParOperation()
    {
        return $this->where('operation !=', 'depot')
            ->where('operation !=', 'transfert_externe')
            ->findAll();
    }

    public function getGainTotal()
    {
        $builder = $this->db->table($this->table);
        $builder->selectSum('total_frais', 'gain_total');
        $builder->where('operation !=', 'depot');
        $builder->where('operation !=', 'transfert_externe');
        $row = $builder->get()->getRow();
        return $row ? $row->gain_total : 0;
    }

    public function getGainsInterne()
    {
        $builder = $this->db->table('operation_utilisateur ou');
        $builder->select('op.libelle AS operation, SUM(f.frais) AS total_frais');
        $builder->join('operation op', 'op.id = ou.id_operation');
        $builder->join('frais f', 'f.id = ou.id_frais', 'left');
        $builder->where('op.libelle !=', 'depot');
        $builder->where('op.libelle !=', 'transfert_externe');
        $builder->where('ou.id_operateur_externe IS NULL');
        $builder->groupBy('op.libelle');
        return $builder->get()->getResultArray();
    }

    public function getGainsExterne()
    {
        $builder = $this->db->table('operation_utilisateur ou');
        $builder->select('oe.nom AS operateur, SUM(ou.montant * oe.commission_pct / 100) AS gain_commission, COUNT(*) AS nombre_transferts');
        $builder->join('operateur_externe oe', 'oe.id = ou.id_operateur_externe');
        $builder->where('ou.id_operateur_externe IS NOT NULL');
        $builder->groupBy('oe.nom');
        return $builder->get()->getResultArray();
    }

    public function getGainTotalGlobal()
    {
        $interne = $this->getGainTotal();
        $externe = $this->db->table('operation_utilisateur ou')
            ->select('SUM(ou.montant * oe.commission_pct / 100) AS total_ext', false)
            ->join('operateur_externe oe', 'oe.id = ou.id_operateur_externe')
            ->where('ou.id_operateur_externe IS NOT NULL')
            ->get()->getRow();
        return $interne + ($externe ? $externe->total_ext : 0);
    }

    public function getMontantsEnvoyesParOperateur()
    {
        $builder = $this->db->table('operation_utilisateur ou');
        $builder->select('oe.nom AS operateur, SUM(ABS(ou.montant)) AS montant_total, COUNT(*) AS nombre_transferts');
        $builder->join('operateur_externe oe', 'oe.id = ou.id_operateur_externe');
        $builder->where('ou.id_operateur_externe IS NOT NULL');
        $builder->where('ou.montant <', 0);
        $builder->groupBy('oe.nom');
        return $builder->get()->getResultArray();
    }
}
