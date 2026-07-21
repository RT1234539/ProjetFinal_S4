<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/')->with('error', 'Veuillez vous connecter.');
        }

        if ($arguments !== null) {
            foreach ($arguments as $role) {
                $roleId = (int) ($user['id_role'] ?? 2);

                if ($role === 'admin' && $roleId !== 1) {
                    return redirect()->to('/accueil');
                }

                if ($role === 'client' && $roleId !== 2) {
                    return redirect()->to('/dashboard');
                }
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
