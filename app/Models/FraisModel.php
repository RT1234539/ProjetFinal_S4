<?php

namespace App\Models;

use CodeIgniter\Model;

class FraisModel extends Model
{
    protected $table            = 'frais';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['montant1', 'montant2', 'frais', 'id_operation'];

    public function getFraisComplet()
    {
        return $this->select('frais.*, operation.libelle AS nom_operation')
            ->join('operation', 'operation.id = frais.id_operation')
            ->findAll();
    }

    public function getFraisApplicable(float $montant, int $idOperation): ?array
    {
        return $this->where('id_operation', $idOperation)
            ->where('montant1 <=', $montant)
            ->where('montant2 >=', $montant)
            ->first();
    }
}
