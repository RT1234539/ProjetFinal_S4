<?php 
namespace App\Models;

use CodeIgniter\Model;

class SoldeModel extends Model
{
    protected $table      = 'v_solde';
    protected $primaryKey = 'id_utilisateur';


    public function getSoldeParUtilisateur(int $idUtilisateur)
    {
        return $this->where('id_utilisateur', $idUtilisateur)->first();
    }

}

