<?php

namespace App\Controllers;

use App\Models\GainsModel;

class GainsController extends BaseController
{
    protected GainsModel $gainsModel;

    public function __construct()
    {
        $this->gainsModel = new GainsModel();
    }

    public function listeGains()
    {
        $gainsParOperation = $this->gainsModel->getGainsParOperation();
        $gainTotal = $this->gainsModel->getGainTotal();

        $data = [
            'gainsParOperation' => $gainsParOperation,
            'gainTotal'   => $gainTotal
        ];

        return view('operateur/gains', $data);
    }
}
