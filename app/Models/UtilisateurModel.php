<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model
{
    protected $table            = 'utilisateur';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields    = [
        'nom',
        'numero'
    ];

    protected $validationRules = [
        'nom'      => 'required|alpha_space|min_length[2]',
        'numero' => 'required|alpha_space|min_length[9]',
    ];
}
