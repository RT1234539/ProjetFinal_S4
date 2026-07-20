<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;
use App\Models\PrefixModel;
use Exception;

class UtilisateurController extends BaseController
{
    protected UtilisateurModel $utilisateurModel;
    protected PrefixModel $prefixModel;

    public function __construct()
    {
        $this->utilisateurModel = new UtilisateurModel();
        $this->prefixModel      = new PrefixModel();
    }

    public function loginForm()
    {
        return view("login");
    }

    public function login()
    {
        try {
            $session = session();
            $tel = $this->request->getPost("telephone");

            $prefix = substr($tel, 0, 3);

            $prefixExiste = $this->prefixModel->where('prefix', $prefix)->first();

            if (!$prefixExiste) {
                throw new Exception("Le numéro de téléphone ne commence pas par un préfixe valide.");
            }

            $utilisateur = $this->utilisateurModel->where('numero', $tel)->first();

            //
            if ($utilisateur) {
                $session->set('user', $utilisateur);
            } else {
                $data = ['numero' => $tel];

                $id = $this->utilisateurModel->insert($data);

                if (!$id) {
                    throw new Exception("Erreur lors de la création de l'utilisateur.");
                }

                $nouvelUtilisateur = $this->utilisateurModel->find($id);
                $session->set('user', $nouvelUtilisateur);
            }

            return view("welcome_message");
        } catch (Exception $e) {
            $data = [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];

            return view("login", $data);
        }
    }

    public function listeClients()
    {
        $data['clients'] = $this->utilisateurModel->listerClientsAvecDetails();
        return view('operateur/clients_list', $data);
    }
}
