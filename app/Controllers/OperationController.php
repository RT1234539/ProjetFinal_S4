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


    public function index(){
        $data['operations'] = $this->operationModel->findAll();
        return view('operateur/operation', $data);
    }

    public function save(){
        $libelle = trim($this->request->getPost('libelle'));

        if (empty($libelle)) {
            return redirect()->back()->with('error', 'Le libellé est obligatoire.');
        }

        $existe = $this->operationModel->where('libelle', $libelle)->countAllResults() > 0;
        if ($existe) {
            return redirect()->back()->with('error', 'Ce type d\'opération existe déjà.');
        }

        $this->operationModel->insert(['libelle' => $libelle]);
        return redirect()->to('/operations');
    }

    public function supprimer($id){
        $this->operationModel->delete($id);
        return redirect()->to('/operations');
    }
}
