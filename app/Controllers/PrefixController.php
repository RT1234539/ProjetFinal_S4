<?php

namespace App\Controllers;

use App\Models\PrefixModel;
use InvalidArgumentException;

class PrefixController extends BaseController
{
    protected PrefixModel $prefixModel;

    public function __construct()
    {
        $this->prefixModel = new PrefixModel();
    }

    public function index()
    {
        $data['prefixes'] = $this->prefixModel->findAll();
        return view('operateur/prefix', $data);
    }

    public function form()
    {
        return view('operateur/prefix_form');
    }

    public function save()
    {
        $prefix = trim($this->request->getPost('prefix'));
        $nom = trim($this->request->getPost('nom'));
        
        if (empty($prefix) || empty($nom)) {
            return redirect()->back()->with('error', 'Le préfixe et le nom sont obligatoires.');
        }

        if (!preg_match('/^\d{3}$/', $prefix)) {
            return redirect()->back()->with('error', 'Le préfixe doit contenir exactement 3 chiffres.');
        }

        if ($this->prefixModel->existe($prefix)) {
            return redirect()->back()->with('error', 'Ce préfixe existe déjà.');
        }

        $this->prefixModel->insert([
            'prefix' => $prefix,
            'nom' => $nom
        ]);

        session()->setFlashdata('success', 'Préfixe ajouté avec succès !');
        return redirect()->to('/prefix');
    }

    public function edit($id)
    {
        $prefix = $this->prefixModel->find($id);
        if (!$prefix) {
            return redirect()->to('/prefix')->with('error', 'Préfixe introuvable.');
        }
        $data['prefix'] = $prefix;
        return view('operateur/prefix_edit', $data);
    }

    public function update($id)
    {
        $prefix = $this->prefixModel->find($id);
        if (!$prefix) {
            return redirect()->to('/prefix')->with('error', 'Préfixe introuvable.');
        }

        $nouveauPrefix = trim($this->request->getPost('prefix'));
        $nom = trim($this->request->getPost('nom'));

        if (empty($nouveauPrefix) || empty($nom)) {
            return redirect()->back()->with('error', 'Le préfixe et le nom sont obligatoires.');
        }

        if (!preg_match('/^\d{3}$/', $nouveauPrefix)) {
            return redirect()->back()->with('error', 'Le préfixe doit contenir exactement 3 chiffres.');
        }

        $exist = $this->prefixModel->where('prefix', $nouveauPrefix)->first();
        if ($exist && $exist->id != $id) {
            return redirect()->back()->with('error', 'Ce préfixe existe déjà.');
        }

        $this->prefixModel->update($id, [
            'prefix' => $nouveauPrefix,
            'nom' => $nom
        ]);

        session()->setFlashdata('success', 'Préfixe mis à jour avec succès !');
        return redirect()->to('/prefix');
    }

    public function delete($id)
    {
        $this->prefixModel->delete($id);
        session()->setFlashdata('success', 'Préfixe supprimé avec succès !');
        return redirect()->to('/prefix');
    }
}