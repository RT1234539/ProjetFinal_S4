<?php

namespace App\Controllers;

use App\Models\FraisModel;

class FraisController extends BaseController
{
    protected FraisModel $fraisModel;

    public function __construct()
    {
        $this->fraisModel = new FraisModel();
    }
}
