<?php
namespace App\Controllers;

use App\Models\OperationUtilisateurModel;
use App\Models\SoldeModel;
use App\Models\FraisModel;
use App\Models\PrefixModel;
use App\Models\UtilisateurModel;
use App\Models\AutreOperateurModel;
use App\Models\OperateurExterneModel;

class OperationUtilisateurController extends BaseController
{
    protected OperationUtilisateurModel $operationUtilisateurModel;
    protected SoldeModel $soldeModel;
    protected FraisModel $fraisModel;
    protected PrefixModel $prefixModel;
    protected UtilisateurModel $utilisateurModel;
    protected AutreOperateurModel $autreOperateurModel;
    protected OperateurExterneModel $operateurExterneModel;

    public function __construct(){
        $this->operationUtilisateurModel = new OperationUtilisateurModel();
        $this->soldeModel = new SoldeModel();
        $this->fraisModel = new FraisModel();
        $this->prefixModel = new PrefixModel();
        $this->utilisateurModel = new UtilisateurModel();
        $this->autreOperateurModel = new AutreOperateurModel();
        $this->operateurExterneModel = new OperateurExterneModel();
    }

    private function getIdUtilisateur(): int
    {
        $user = session()->get('user');
        return (int) ($user['id'] ?? 0);
    }

    private function getClientData(): array
    {
        $id = $this->getIdUtilisateur();
        $user = session()->get('user') ?? ['numero' => '0000000000', 'id' => $id];
        $solde = $this->soldeModel->getSoldeParUtilisateur($id);
        return ['user' => $user, 'solde' => $solde];
    }

    public function voirSolde(){
        $solde = $this->soldeModel->getSoldeParUtilisateur($this->getIdUtilisateur());
        $data = array_merge($this->getClientData(), ['solde_info' => $solde]);
        return view('client/solde', $data);
    }

    public function depotForm(){
        return view('client/depot', $this->getClientData());
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
        return view('client/retrait', $this->getClientData());
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
                ' Ar. Total requis : ' . number_format($total, 0, ',', ' ') . ' Ar.');
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
        $data = array_merge($this->getClientData(), [
            'autreOperateurs' => $this->autreOperateurModel->findAll(),
        ]);
        return view('client/transfert', $data);
    }

    public function faireUnTransfert()
    {
        $idExpediteur = $this->getIdUtilisateur();
        $montant = (float) $this->request->getPost('montant');
        $numeroDestinataire = trim($this->request->getPost('numero'));
        $inclureFraisRetrait = $this->request->getPost('inclure_frais_retrait') === '1';

        if ($montant <= 0) {
            return redirect()->back()->with('error', 'Le montant doit être positif.');
        }
        if (empty($numeroDestinataire)) {
            return redirect()->back()->with('error', 'Le numéro du destinataire est obligatoire.');
        }

        $prefix = substr($numeroDestinataire, 0, 3);

        $isInterne = $this->prefixModel->existe($prefix);

        if (!$isInterne) {
            return redirect()->back()->with('error', 'Le préfixe ' . $prefix . ' n\'est pas valide pour un transfert interne.');
        }

        $expediteur = $this->utilisateurModel->find($idExpediteur);
        if ($expediteur && $expediteur['numero'] === $numeroDestinataire) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas vous transférer à vous-même.');
        }

        $frais = $this->fraisModel->getFraisApplicable($montant, 3);
        $montantFrais = $frais ? $frais['frais'] : 0;

        $total = $montant + $montantFrais;

        // If including withdrawal fees for the recipient
        if ($inclureFraisRetrait) {
            $fraisRetraitDest = $this->fraisModel->getFraisApplicable($montant, 2);
            $montantFraisRetrait = $fraisRetraitDest ? $fraisRetraitDest['frais'] : 0;
            $total += $montantFraisRetrait;
        }

        $solde = $this->soldeModel->getSoldeParUtilisateur($idExpediteur);
        $soldeActuel = $solde ? $solde['solde'] : 0;

        if ($soldeActuel < $total) {
            return redirect()->back()->with('error',
                'Solde insuffisant. Solde : ' . number_format($soldeActuel, 0, ',', ' ') .
                ' Ar. Total requis : ' . number_format($total, 0, ',', ' ') . ' Ar.');
        }

        $destinataire = $this->utilisateurModel->where('numero', $numeroDestinataire)->first();
        $idDest = $destinataire ? $destinataire['id'] : $this->utilisateurModel->insert(['numero' => $numeroDestinataire, 'id_role' => 2]);

        $this->operationUtilisateurModel->insert([
            'id_operation'   => 3,
            'id_utilisateur' => $idExpediteur,
            'montant'        => -$total,
            'id_frais'       => $frais ? $frais['id'] : null,
            'date'           => date('Y-m-d'),
        ]);

        $montantRecu = $inclureFraisRetrait ? ($montant + ($fraisRetraitDest ? $fraisRetraitDest['frais'] : 0)) : $montant;
        $this->operationUtilisateurModel->insert([
            'id_operation'   => 3,
            'id_utilisateur' => $idDest,
            'montant'        => $montantRecu,
            'id_frais'       => null,
            'date'           => date('Y-m-d'),
        ]);

        return redirect()->to('/accueil')->with('success',
            'Transfert de ' . number_format($montant, 0, ',', ' ') . ' Ar vers ' . $numeroDestinataire . ' effectué.');
    }

    public function transfertExterneForm()
    {
        $data = array_merge($this->getClientData(), [
            'operateursExternes' => $this->operateurExterneModel->getTous(),
            'autreOperateurs' => $this->autreOperateurModel->findAll(),
        ]);
        return view('client/transfert_externe', $data);
    }

    public function faireTransfertExterne()
    {
        $idExpediteur = $this->getIdUtilisateur();
        $montant = (float) $this->request->getPost('montant');
        $numeroDestinataire = trim($this->request->getPost('numero'));
        $idOperateurExterne = (int) $this->request->getPost('id_operateur_externe');

        if ($montant <= 0) {
            return redirect()->back()->with('error', 'Le montant doit être positif.');
        }
        if (empty($numeroDestinataire)) {
            return redirect()->back()->with('error', 'Le numéro du destinataire est obligatoire.');
        }
        if (empty($idOperateurExterne)) {
            return redirect()->back()->with('error', 'Veuillez sélectionner un opérateur externe.');
        }

        $opExterne = $this->operateurExterneModel->find($idOperateurExterne);
        if (!$opExterne) {
            return redirect()->back()->with('error', 'Opérateur externe invalide.');
        }

        $commission = ($montant * $opExterne['commission_pct']) / 100;
        $total = $montant + $commission;

        $solde = $this->soldeModel->getSoldeParUtilisateur($idExpediteur);
        $soldeActuel = $solde ? $solde['solde'] : 0;

        if ($soldeActuel < $total) {
            return redirect()->back()->with('error',
                'Solde insuffisant. Solde : ' . number_format($soldeActuel, 0, ',', ' ') .
                ' Ar. Total requis (montant + commission ' . $opExterne['commission_pct'] . '%) : ' . number_format($total, 0, ',', ' ') . ' Ar.');
        }

        // Find operation id for transfert_externe
        $opModel = new \App\Models\OperationModel();
        $opTransfExt = $opModel->where('libelle', 'transfert_externe')->first();
        $idOp = $opTransfExt ? $opTransfExt['id'] : 3; // fallback to transfert

        $this->operationUtilisateurModel->insert([
            'id_operation'         => $idOp,
            'id_utilisateur'       => $idExpediteur,
            'montant'              => -$total,
            'id_frais'             => null,
            'date'                 => date('Y-m-d'),
            'numero_dest'          => $numeroDestinataire,
            'id_operateur_externe' => $idOperateurExterne,
        ]);

        return redirect()->to('/accueil')->with('success',
            'Transfert externe de ' . number_format($montant, 0, ',', ' ') . ' Ar vers ' . $numeroDestinataire . ' via ' . $opExterne['nom'] . ' effectué. Commission : ' . number_format($commission, 0, ',', ' ') . ' Ar.');
    }

    public function transfertMultipleForm()
    {
        $data = array_merge($this->getClientData(), [
            'autreOperateurs' => $this->autreOperateurModel->findAll(),
        ]);
        return view('client/transfert_multiple', $data);
    }

    public function faireTransfertMultiple()
    {
        $idExpediteur = $this->getIdUtilisateur();
        $montantTotal = (float) $this->request->getPost('montant');
        $numerosRaw = trim($this->request->getPost('numeros'));

        if ($montantTotal <= 0) {
            return redirect()->back()->with('error', 'Le montant total doit être positif.');
        }
        if (empty($numerosRaw)) {
            return redirect()->back()->with('error', 'Veuillez entrer au moins un numéro.');
        }

        $numeros = array_filter(array_map('trim', explode("\n", $numerosRaw)));

        if (empty($numeros)) {
            return redirect()->back()->with('error', 'Aucun numéro valide trouvé.');
        }

        // Verify all numbers are internal
        foreach ($numeros as $num) {
            $prefix = substr($num, 0, 3);
            if (!$this->prefixModel->existe($prefix)) {
                return redirect()->back()->with('error', 'Le numéro ' . $num . ' n\'est pas un numéro interne valide (préfixe ' . $prefix . ').');
            }
        }

        $nbDest = count($numeros);
        $montantChaque = $montantTotal / $nbDest;

        $frais = $this->fraisModel->getFraisApplicable($montantChaque, 3);
        $fraisParDest = $frais ? $frais['frais'] : 0;
        $totalFrais = $fraisParDest * $nbDest;
        $total = $montantTotal + $totalFrais;

        $solde = $this->soldeModel->getSoldeParUtilisateur($idExpediteur);
        $soldeActuel = $solde ? $solde['solde'] : 0;

        if ($soldeActuel < $total) {
            return redirect()->back()->with('error',
                'Solde insuffisant. Solde : ' . number_format($soldeActuel, 0, ',', ' ') .
                ' Ar. Total requis (montant + frais) : ' . number_format($total, 0, ',', ' ') . ' Ar.');
        }

        // Debit sender
        $this->operationUtilisateurModel->insert([
            'id_operation'   => 3,
            'id_utilisateur' => $idExpediteur,
            'montant'        => -$total,
            'id_frais'       => $frais ? $frais['id'] : null,
            'date'           => date('Y-m-d'),
        ]);

        // Credit each recipient
        foreach ($numeros as $num) {
            $dest = $this->utilisateurModel->where('numero', $num)->first();
            $idDest = $dest ? $dest['id'] : $this->utilisateurModel->insert(['numero' => $num, 'id_role' => 2]);
            $this->operationUtilisateurModel->insert([
                'id_operation'   => 3,
                'id_utilisateur' => $idDest,
                'montant'        => $montantChaque,
                'id_frais'       => null,
                'date'           => date('Y-m-d'),
            ]);
        }

        return redirect()->to('/accueil')->with('success',
            'Transfert multiple de ' . number_format($montantChaque, 0, ',', ' ') . ' Ar vers ' . $nbDest . ' destinataire(s) effectué. Total : ' . number_format($total, 0, ',', ' ') . ' Ar.');
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
        $data = array_merge($this->getClientData(), ['historique' => $historique]);
        return view('client/historique', $data);
    }
}
