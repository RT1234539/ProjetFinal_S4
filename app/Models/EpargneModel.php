<?php

namespace App\Models;

use CodeIgniter\Model;

class EpargneModel extends Model
{
    protected $table            = 'frais';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_utlisateur','quantite'];


}
