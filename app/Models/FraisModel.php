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
}
