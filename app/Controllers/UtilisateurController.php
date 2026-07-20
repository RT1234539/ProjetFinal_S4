<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;

class UtilisateurController extends BaseController
{
    protected UtilisateurModel $utilisateurModel;

    public function __construct()
    {
        $this->utilisateurModel = new UtilisateurModel();
    }
}
