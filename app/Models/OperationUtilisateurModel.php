<?php

namespace App\Models;

use CodeIgniter\Model;

class OperationUtilisateurModel extends Model
{
    protected $table            = 'operation_utilisateur';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_operation', 'id_utilisateur', 'montant', 'id_frais', 'date', 'numero_dest', 'id_operateur_externe'];

    protected $validationRules = [
        'id_operation'         => 'required|integer',
        'id_utilisateur'       => 'required|integer',
        'montant'              => 'required|numeric',
        'id_frais'             => 'permit_empty|integer',
        'date'                 => 'required',
        'numero_dest'          => 'permit_empty|max_length[20]',
        'id_operateur_externe' => 'permit_empty|integer',
    ];
}
