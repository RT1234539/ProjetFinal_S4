<?php

namespace App\Models;

use CodeIgniter\Model;

class soleEpargneModel extends Model
{
    protected $table            = 'soleEpargne';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_utlisateur','solde'];


}
