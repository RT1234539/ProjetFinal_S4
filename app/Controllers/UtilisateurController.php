<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;
use App\Models\PrefixModel;
use App\Models\SoldeModel;
use App\Models\GainsModel;
use Exception;

class UtilisateurController extends BaseController
{
    protected UtilisateurModel $utilisateurModel;
    protected PrefixModel $prefixModel;
    protected SoldeModel $soldeModel;
    protected GainsModel $gainsModel;

    public function __construct()
    {
        $this->utilisateurModel = new UtilisateurModel();
        $this->prefixModel      = new PrefixModel();
        $this->soldeModel       = new SoldeModel();
        $this->gainsModel       = new GainsModel();
    }

    public function loginForm()
    {
        if (session()->get('user')) {
            return $this->redirectByRole();
        }
        return view("login");
    }

    public function login()
    {
        try {
            $session = session();
            $tel = trim($this->request->getPost("telephone"));

            if (empty($tel)) {
                throw new Exception("Veuillez saisir votre numéro de téléphone.");
            }

            $prefix = substr($tel, 0, 3);
            $prefixExiste = $this->prefixModel->where('prefix', $prefix)->first();

            if (!$prefixExiste) {
                throw new Exception("Le numéro de téléphone ne commence pas par un préfixe valide.");
            }

            $utilisateur = $this->utilisateurModel->where('numero', $tel)->first();

            if ($utilisateur) {
                $session->set('user', $utilisateur);
            } else {
                $totalUsers = $this->utilisateurModel->countAll();

                $idRole = ($totalUsers === 0) ? 1 : 2;

                $data = [
                    'numero'   => $tel,
                    'id_role'  => $idRole,
                ];

                $id = $this->utilisateurModel->insert($data);

                if (!$id) {
                    throw new Exception("Erreur lors de la création de l'utilisateur.");
                }

                $nouvelUtilisateur = $this->utilisateurModel->find($id);
                $session->set('user', $nouvelUtilisateur);
            }

            return $this->redirectByRole();

        } catch (Exception $e) {
            $data = [
                'status'  => 'error',
                'message' => $e->getMessage(),
            ];
            return view("login", $data);
        }
    }

    private function redirectByRole()
    {
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/');
        }

        $roleId = (int) ($user['id_role'] ?? 2);

        if ($roleId === 1) {
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/accueil');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function accueil()
    {
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/');
        }

        $id = (int) $user['id'];
        $solde = $this->soldeModel->getSoldeParUtilisateur($id);
        $data = [
            'user'  => $user,
            'solde' => $solde,
        ];
        return view('client/accueil', $data);
    }

    public function dashboard()
    {
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/');
        }

        $db = db_connect();

        $nbClients    = $this->utilisateurModel->where('id_role', 2)->countAllResults();
        $nbOperations = $db->table('operation_utilisateur')->countAllResults();
        $nbPrefixes   = $this->prefixModel->countAllResults();
        $gainTotal    = $this->gainsModel->getGainTotalGlobal();

        $dernieresOps = $db->table('operation_utilisateur ou')
            ->select('ou.montant, ou.date, op.libelle AS operation, u.numero')
            ->join('operation op', 'op.id = ou.id_operation')
            ->join('utilisateur u', 'u.id = ou.id_utilisateur')
            ->orderBy('ou.date', 'DESC')
            ->orderBy('ou.id', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();

        $data = [
            'user'        => $user,
            'nbClients'   => $nbClients,
            'nbOperations'=> $nbOperations,
            'nbPrefixes'  => $nbPrefixes,
            'gainTotal'   => $gainTotal,
            'dernieresOps'=> $dernieresOps,
        ];
        return view('operateur/dashboard', $data);
    }

    public function listeClients()
    {
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/');
        }

        $search = $this->request->getGet('search') ?? '';
        $data['clients'] = $this->utilisateurModel->listerClientsAvecDetails($search);
        $data['search'] = $search;
        $data['user'] = $user;
        return view('operateur/clients_list', $data);
    }

    public function detailClient(int $id)
    {
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/');
        }

        $client = $this->utilisateurModel->getDetailClient($id);
        if (!$client) {
            return redirect()->to('/clients')->with('error', 'Client introuvable.');
        }

        $historique = $this->utilisateurModel->getHistorique($id, 5);
        $data = [
            'client'     => $client,
            'historique' => $historique,
            'user'       => $user,
        ];
        return view('operateur/detail_client', $data);
    }
}
