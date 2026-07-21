<?php
namespace App\Controllers;

use App\Models\AutreOperateurModel;
use App\Models\OperateurExterneModel;

class AutreOperateurController extends BaseController
{
    protected AutreOperateurModel $autreOperateurModel;
    protected OperateurExterneModel $operateurExterneModel;

    public function __construct()
    {
        $this->autreOperateurModel = new AutreOperateurModel();
        $this->operateurExterneModel = new OperateurExterneModel();
    }

    public function index()
    {
        $data['autreOperateurs'] = $this->autreOperateurModel->findAll();
        return view('operateur/autre_operateur', $data);
    }

    public function form()
    {
        return view('operateur/autre_operateur_form');
    }

    public function save()
    {
        $prefix = trim($this->request->getPost('prefix'));
        $nom = trim($this->request->getPost('nom'));

        if (empty($prefix) || empty($nom)) {
            return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
        }

        if (!preg_match('/^\d{3}$/', $prefix)) {
            return redirect()->back()->with('error', 'Le préfixe doit contenir exactement 3 chiffres.');
        }

        if ($this->autreOperateurModel->existe($prefix)) {
            return redirect()->back()->with('error', 'Ce préfixe existe déjà.');
        }

        $this->autreOperateurModel->insert(['prefix' => $prefix, 'nom' => $nom]);
        session()->setFlashdata('success', 'Opérateur externe ajouté avec succès !');
        return redirect()->to('/autre-operateur');
    }

    public function edit($id)
    {
        $op = $this->autreOperateurModel->find($id);
        if (!$op) {
            return redirect()->to('/autre-operateur')->with('error', 'Opérateur introuvable.');
        }
        $data['autreOperateur'] = $op;
        return view('operateur/autre_operateur_edit', $data);
    }

    public function update($id)
    {
        $op = $this->autreOperateurModel->find($id);
        if (!$op) {
            return redirect()->to('/autre-operateur')->with('error', 'Opérateur introuvable.');
        }

        $prefix = trim($this->request->getPost('prefix'));
        $nom = trim($this->request->getPost('nom'));

        if (empty($prefix) || empty($nom)) {
            return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
        }

        if (!preg_match('/^\d{3}$/', $prefix)) {
            return redirect()->back()->with('error', 'Le préfixe doit contenir exactement 3 chiffres.');
        }

        $exist = $this->autreOperateurModel->where('prefix', $prefix)->first();
        if ($exist && $exist['id'] != $id) {
            return redirect()->back()->with('error', 'Ce préfixe existe déjà.');
        }

        $this->autreOperateurModel->update($id, ['prefix' => $prefix, 'nom' => $nom]);
        session()->setFlashdata('success', 'Opérateur mis à jour avec succès !');
        return redirect()->to('/autre-operateur');
    }

    public function delete($id)
    {
        $this->autreOperateurModel->delete($id);
        session()->setFlashdata('success', 'Opérateur supprimé avec succès !');
        return redirect()->to('/autre-operateur');
    }

    public function externeForm()
    {
        $data['operateursExternes'] = $this->operateurExterneModel->getTous();
        $data['autreOperateurs'] = $this->autreOperateurModel->findAll();
        return view('operateur/operateur_externe', $data);
    }

    public function externeSave()
    {
        $nom = trim($this->request->getPost('nom'));
        $commission = (float) $this->request->getPost('commission_pct');
        $idAutre = (int) $this->request->getPost('id_autre_operateur');

        if (empty($nom) || $commission < 0 || empty($idAutre)) {
            return redirect()->back()->with('error', 'Tous les champs sont obligatoires et la commission doit être positive.');
        }

        $this->operateurExterneModel->insert([
            'nom' => $nom,
            'commission_pct' => $commission,
            'id_autre_operateur' => $idAutre
        ]);
        session()->setFlashdata('success', 'Opérateur externe ajouté avec succès !');
        return redirect()->to('/autre-operateur/externe');
    }

    public function externeDelete($id)
    {
        $this->operateurExterneModel->delete($id);
        session()->setFlashdata('success', 'Opérateur externe supprimé avec succès !');
        return redirect()->to('/autre-operateur/externe');
    }
}
