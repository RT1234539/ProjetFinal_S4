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
        $data = [
            'gainsParOperation' => $this->gainsModel->getGainsParOperation(),
            'gainTotal'         => $this->gainsModel->getGainTotal(),
            'gainsInterne'      => $this->gainsModel->getGainsInterne(),
            'gainsExterne'      => $this->gainsModel->getGainsExterne(),
            'gainTotalGlobal'   => $this->gainsModel->getGainTotalGlobal(),
            'montantsEnvoyes'   => $this->gainsModel->getMontantsEnvoyesParOperateur(),
        ];
        return view('operateur/gains', $data);
    }
}
