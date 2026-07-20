<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model
{
    protected $table            = 'utilisateur';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['numero'];


    public function listerClientsAvecDetails(): array
    {
        return $this->db->table('v_solde vs')
            ->select('vs.*, COALESCE(c.nombre_operations, 0) AS nombre_operations')
            ->join('(SELECT id_utilisateur, COUNT(*) AS nombre_operations FROM operation_utilisateur GROUP BY id_utilisateur) c', 'c.id_utilisateur = vs.id_utilisateur', 'left')
            ->where('vs.id_role', 2)
            ->get()
            ->getResultArray();
    }


    public function getDetailClient(int $id): ?array
        {
            return $this->db->table('v_solde vs')
                ->select('vs.*, COALESCE(c.nombre_operations, 0) AS nombre_operations')
                ->join('(SELECT id_utilisateur, COUNT(*) AS nombre_operations FROM operation_utilisateur GROUP BY id_utilisateur) c', 'c.id_utilisateur = vs.id_utilisateur', 'left')
                ->where('vs.id_utilisateur', $id)
                ->get()
                ->getRowArray();
        }

    public function getHistorique(int $idUtilisateur, int $limit = 10): array
    {
        return $this->db->table('operation_utilisateur ou')
            ->select('ou.*, op.libelle AS operation')
            ->join('operation op', 'op.id = ou.id_operation')
            ->where('ou.id_utilisateur', $idUtilisateur)
            ->orderBy('ou.date', 'DESC')
            ->orderBy('ou.id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
}