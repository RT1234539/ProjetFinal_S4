<?php

namespace App\Controllers;

use App\Models\OperationUtilisateurModel;

class OperationUtilisateurController extends BaseController
{
    protected OperationUtilisateurModel $operationUtilisateurModel;

    public function __construct()
    {
        $this->operationUtilisateurModel = new OperationUtilisateurModel();
    }
}
