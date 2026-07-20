<?php

namespace App\Controllers;

use App\Models\FraisModel;
use App\Models\OperationModel;
use Exception;

class FraisController extends BaseController
{
    protected FraisModel $fraisModel;

    public function __construct()
    {
        $this->fraisModel = new FraisModel();
    }

    public function ajouterForm()
    {
        $liste = $this->fraisModel
            ->getFraisComplet();
        $operationModel = new OperationModel();

        $data = [
            'liste' => $liste,
            'operations' => $operationModel->findAll(),
        ];

        return view('operateur/addFrais', $data);
    }

    public function insert()
    {
        $operationModel = new OperationModel();
        try {
            $montantMin = $this->request->getPost("min");
            $montantMax = $this->request->getPost("max");
            $frais = $this->request->getPost("frais");
            $operationType = $this->request->getPost("operation");

            if ($montantMin === '' || $montantMax === '' || $frais === '') {
                throw new Exception("Tous les champs sont obligatoires.");
            }

            if ($montantMin < 0 || $montantMax < 0 || $frais < 0) {
                throw new Exception("Les valeurs tapés doivent toujours être positifs");
            }

            if ($montantMin > $montantMax) {
                throw new Exception("Montant minimum invalide");
            }

            if (!$operationModel->find($operationType)) {
                throw new Exception("Type d'opération invalide");
            }

            $data = [
                'montant1' => $montantMin,
                'montant2' => $montantMax,
                'frais' => $frais,
                'id_operation' => $operationType,
            ];

            $this->fraisModel->insert($data);

            return redirect()->to(base_url('frais/ajouter'))->with('success', 'Frais ajouté avec succès.');
        } catch (Exception $e) {
            $data = [
                'status' => 'error',
                'message' => $e->getMessage(),
                'operations' => $operationModel->findAll(),
            ];
            return view("operateur/addFrais", $data);
            // throw $e;
        }
    }
}
