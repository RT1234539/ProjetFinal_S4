<?php

namespace App\Controllers;

use App\Models\PrefixModel;

class PrefixController extends BaseController
{
    protected PrefixModel $prefixModel;

    public function __construct()
    {
        $this->prefixModel = new PrefixModel();
    }

}
