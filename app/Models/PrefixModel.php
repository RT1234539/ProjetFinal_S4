<?php

namespace App\Models;

use CodeIgniter\Model;

class PrefixModel extends Model
{
    protected $table            = 'prefix';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['prefix'];

    protected $validationRules = [
        'prefix' => 'required|max_length[3]',
    ];
}
