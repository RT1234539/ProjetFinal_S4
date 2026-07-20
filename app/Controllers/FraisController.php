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
        $liste = $this->fraisModel->getFraisComplet();
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
                'liste' => $this->fraisModel->getFraisComplet(),
            ];
            return view("operateur/addFrais", $data);
        }
    }

    public function edit($id)
    {
        $frais = $this->fraisModel->find($id);
        if (!$frais) {
            return redirect()->to('/frais/ajouter')->with('error', 'Barème introuvable.');
        }
        $operationModel = new OperationModel();
        $data = [
            'frais' => $frais,
            'operations' => $operationModel->findAll(),
        ];
        return view('operateur/frais_edit', $data);
    }

    public function update($id)
    {
        $frais = $this->fraisModel->find($id);
        if (!$frais) {
            return redirect()->to('/frais/ajouter')->with('error', 'Barème introuvable.');
        }

        $operationModel = new OperationModel();

        try {
            $montantMin = $this->request->getPost("min");
            $montantMax = $this->request->getPost("max");
            $montantFrais = $this->request->getPost("frais");
            $operationType = $this->request->getPost("operation");

            if ($montantMin === '' || $montantMax === '' || $montantFrais === '') {
                throw new Exception("Tous les champs sont obligatoires.");
            }

            if ($montantMin < 0 || $montantMax < 0 || $montantFrais < 0) {
                throw new Exception("Les valeurs doivent être positives.");
            }

            if ($montantMin > $montantMax) {
                throw new Exception("Montant minimum invalide.");
            }

            if (!$operationModel->find($operationType)) {
                throw new Exception("Type d'opération invalide.");
            }

            $this->fraisModel->update($id, [
                'montant1' => $montantMin,
                'montant2' => $montantMax,
                'frais' => $montantFrais,
                'id_operation' => $operationType,
            ]);

            return redirect()->to('/frais/ajouter')->with('success', 'Barème mis à jour avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $this->fraisModel->delete($id);
        return redirect()->to('/frais/ajouter')->with('success', 'Barème supprimé avec succès.');
    }
}
