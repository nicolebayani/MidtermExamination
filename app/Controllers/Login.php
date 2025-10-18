<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        // Show the login form
        return view('login');
    }

    public function attempt()
    {
        $session = session();
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'password' => 'required|min_length[3]|max_length[255]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // NOTE: This is a placeholder. Replace with real authentication.
        if ($username === 'admin' && $password === 'password') {
            $session->set('isLoggedIn', true);
            $session->set('username', $username);
            return redirect()->to(base_url('/admin/dashboard'));
        }

        if ($username === 'teacher' && $password === 'password') {
            $session->set('isLoggedIn', true);
            $session->set('username', $username);
            return redirect()->to(base_url('/teacher/dashboard'));
        }

        // Invalid credentials
        return redirect()->back()->withInput()->with('error', 'Invalid credentials. Try admin/password or teacher/password for demo.');
    }
}
