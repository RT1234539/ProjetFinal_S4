<?php
namespace App\Models;
use CodeIgniter\Model;

class OperateurExterneModel extends Model
{
    protected $table = 'operateur_externe';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['nom', 'commission_pct', 'id_autre_operateur'];

    public function getTous()
    {
        return $this->select('operateur_externe.*, autre_operateur.prefix AS ext_prefix, autre_operateur.nom AS op_nom')
            ->join('autre_operateur', 'autre_operateur.id = operateur_externe.id_autre_operateur')
            ->findAll();
    }
}
