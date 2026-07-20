<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UtilisateurModel;

class UtilisateurController extends BaseController
{
    private $utilisateurModel;

    public function __construct()
    {
        $this->utilisateurModel = new UtilisateurModel();
    }
}
