<?php

namespace App\Controllers;

use App\Models\OperationModel;

class OperationController extends BaseController
{
    protected OperationModel $operationModel;

    public function __construct()
    {
        $this->operationModel = new OperationModel();
    }
}
