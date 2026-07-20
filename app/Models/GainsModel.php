<?php

namespace App\Models;

use CodeIgniter\Model;

class GainsModel extends Model
{
    protected $table            = 'v_gains_complet';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $allowedFields    = [];
    protected $useTimestamps    = false;

    public function getGainsParOperation()
    {
        return $this->findAll();
    }

    public function getGainTotal()
    {
        $builder = $this->db->table($this->table);
        $builder->selectSum('total_frais', 'gain_total');

        $query = $builder->get();
        $row   = $query->getRow();

        if ($row != null) {
            return $row->gain_total;
        } else {
            return 0;
        }
    }
}
