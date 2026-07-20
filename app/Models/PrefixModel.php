<?php

namespace App\Models;

use CodeIgniter\Model;

class PrefixModel extends Model
{
    protected $table = 'prefix'; // Adaptez le nom de votre table
    protected $primaryKey = 'id';
    protected $allowedFields = ['prefix', 'nom'];
    protected $returnType = 'object'; // Pour utiliser ->id, ->code, ->operateur dans la vue

    public function existe($prefix)
    {
        return $this->where('prefix', $prefix)->first() !== null;
    }
}