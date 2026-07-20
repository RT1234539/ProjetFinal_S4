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
        // Correction : utilisation de getPost() correctement
        $prefix = trim($this->request->getPost('prefix'));
        $nom = trim($this->request->getPost('nom'));
        
        if (empty($prefix) || empty($nom)) {
            throw new InvalidArgumentException('Le préfixe et le nom sont obligatoires.');
        }

        if (!preg_match('/^\d{3}$/', $prefix)) {
            throw new InvalidArgumentException('Le préfixe doit contenir exactement 3 chiffres.');
        }

        if ($this->prefixModel->existe($prefix)) {
            throw new InvalidArgumentException('Ce préfixe existe déjà.');
        }

        $this->prefixModel->insert([
            'prefix' => $prefix,
            'nom' => $nom
        ]);

        // Redirection vers la liste des préfixes ou vers le formulaire avec message de succès
        session()->setFlashdata('success', 'Préfixe ajouté avec succès !');
        return redirect()->to('/prefix');
    }
}