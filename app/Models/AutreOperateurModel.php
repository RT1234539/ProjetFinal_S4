<?php
namespace App\Models;
use CodeIgniter\Model;

class AutreOperateurModel extends Model
{
    protected $table = 'autre_operateur';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['prefix', 'nom'];

    public function existe($prefix)
    {
        return $this->where('prefix', $prefix)->first() !== null;
    }
}
