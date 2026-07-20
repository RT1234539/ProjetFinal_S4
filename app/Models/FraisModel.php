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

    protected $validationRules = [
        'montant1'     => 'required|numeric',
        'montant2'     => 'required|numeric',
        'frais'        => 'required|numeric',
        'id_operation' => 'required|integer',
    ];
}
