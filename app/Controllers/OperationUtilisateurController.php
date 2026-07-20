<?php

namespace App\Controllers;

use App\Models\OperationUtilisateurModel;
use App\Models\SoldeModel;
use App\Models\FraisModel;
use App\Models\PrefixModel;
use App\Models\UtilisateurModel;

class OperationUtilisateurController extends BaseController
{
    protected OperationUtilisateurModel $operationUtilisateurModel;
    protected SoldeModel $soldeModel;
    protected FraisModel $fraisModel;
    protected PrefixModel $prefixModel;
    protected UtilisateurModel $utilisateurModel;

    public function __construct(){
        $this->operationUtilisateurModel = new OperationUtilisateurModel();
        $this->soldeModel = new SoldeModel();
        $this->fraisModel = new FraisModel();
        $this->prefixModel = new PrefixModel();
        $this->utilisateurModel = new UtilisateurModel();
    }

    private function requireAuth(): int
    {
        $user = session()->get('user');
        if (!$user) {
            return 0;
        }
        return (int) $user['id'];
    }

    private function getIdUtilisateur(): int
    {
        $user = session()->get('user');
        return (int) ($user['id'] ?? 0);
    }

    public function voirSolde(){
        $solde = $this->soldeModel->getSoldeParUtilisateur($this->getIdUtilisateur());
        $data['solde'] = $solde;
        return view('client/solde', $data);
    }

    public function depotForm(){
        return view('client/depot');
    }

    public function faireUnDepot(){
        $id = $this->getIdUtilisateur();
        $montant = $this->request->getPost('montant');

        if ($montant === null || $montant === '' || $montant <= 0) {
            return redirect()->back()->with('error', 'Le montant doit être positif et non vide.');
        }

        $this->operationUtilisateurModel->insert([
            'id_operation'   => 1,
            'id_utilisateur' => $id,
            'montant'        => $montant,
            'id_frais'       => null,
            'date'           => date('Y-m-d'),
        ]);

        return redirect()->to('/accueil')->with('success', 'Dépôt effectué avec succès.');
    }

    public function retraitForm(){
        return view('client/retrait');
    }

    public function faireUnRetrait(){
        $id = $this->getIdUtilisateur();
        $montant = (float) $this->request->getPost('montant');

        if ($montant <= 0) {
            return redirect()->back()->with('error', 'Le montant doit être positif.');
        }

        $frais = $this->fraisModel->getFraisApplicable($montant, 2);
        $montantFrais = $frais ? $frais['frais'] : 0;
        $total = $montant + $montantFrais;

        $solde = $this->soldeModel->getSoldeParUtilisateur($id);
        $soldeActuel = $solde ? $solde['solde'] : 0;

        if ($soldeActuel < $total) {
            return redirect()->back()->with('error',
                'Solde insuffisant. Solde : ' . number_format($soldeActuel, 0, ',', ' ') .
                ' Ar. Total requis : ' . number_format($total, 0, ',', ' ') . ' Ar.'
            );
        }

        $this->operationUtilisateurModel->insert([
            'id_operation'   => 2,
            'id_utilisateur' => $id,
            'montant'        => -$montant,
            'id_frais'       => $frais ? $frais['id'] : null,
            'date'           => date('Y-m-d'),
        ]);

        return redirect()->to('/accueil')->with('success', 'Retrait effectué avec succès.');
    }

    public function transfertForm()
    {
        return view('client/transfert');
    }

    public function faireUnTransfert()
    {
        $idExpediteur = $this->getIdUtilisateur();
        $montant = (float) $this->request->getPost('montant');
        $numeroDestinataire = trim($this->request->getPost('numero'));

        if ($montant <= 0) {
            return redirect()->back()->with('error', 'Le montant doit être positif.');
        }

        if (empty($numeroDestinataire)) {
            return redirect()->back()->with('error', 'Le numéro du destinataire est obligatoire.');
        }

        $prefix = substr($numeroDestinataire, 0, 3);
        if (!$this->prefixModel->existe($prefix)) {
            return redirect()->back()->with('error', 'Le préfixe ' . $prefix . ' n\'est pas valide.');
        }

        $expediteur = $this->utilisateurModel->find($idExpediteur);
        if ($expediteur && $expediteur['numero'] === $numeroDestinataire) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas vous transférer à vous-même.');
        }

        $frais = $this->fraisModel->getFraisApplicable($montant, 3);
        $montantFrais = $frais ? $frais['frais'] : 0;
        $total = $montant + $montantFrais;

        $solde = $this->soldeModel->getSoldeParUtilisateur($idExpediteur);
        $soldeActuel = $solde ? $solde['solde'] : 0;

        if ($soldeActuel < $total) {
            return redirect()->back()->with('error',
                'Solde insuffisant. Solde : ' . number_format($soldeActuel, 0, ',', ' ') .
                ' Ar. Total requis : ' . number_format($total, 0, ',', ' ') . ' Ar.'
            );
        }

        $destinataire = $this->utilisateurModel->where('numero', $numeroDestinataire)->first();
        $idDest = $destinataire ? $destinataire['id'] : $this->utilisateurModel->insert(['numero' => $numeroDestinataire, 'id_role' => 2]);

        $this->operationUtilisateurModel->insert([
            'id_operation'   => 3,
            'id_utilisateur' => $idExpediteur,
            'montant'        => -$montant,
            'id_frais'       => $frais ? $frais['id'] : null,
            'date'           => date('Y-m-d'),
        ]);

        $this->operationUtilisateurModel->insert([
            'id_operation'   => 3,
            'id_utilisateur' => $idDest,
            'montant'        => $montant,
            'id_frais'       => null,
            'date'           => date('Y-m-d'),
        ]);

        return redirect()->to('/accueil')->with('success',
            'Transfert de ' . number_format($montant, 0, ',', ' ') . ' Ar vers ' . $numeroDestinataire . ' effectué.'
        );
    }

    public function historique()
    {
        $id = $this->getIdUtilisateur();
        $historique = $this->operationUtilisateurModel
            ->select('operation_utilisateur.*, operation.libelle AS operation')
            ->join('operation', 'operation.id = operation_utilisateur.id_operation')
            ->where('operation_utilisateur.id_utilisateur', $id)
            ->orderBy('operation_utilisateur.date', 'DESC')
            ->orderBy('operation_utilisateur.id', 'DESC')
            ->findAll();

        $data['historique'] = $historique;
        return view('client/historique', $data);
    }
}
