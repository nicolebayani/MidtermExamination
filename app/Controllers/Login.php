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
        // Support old demo usernames for convenience
        if ($username === 'admin' && $password === 'password') {
            $session->set('isLoggedIn', true);
            $session->set('username', $username);
            $session->set('role', 'admin');
            return redirect()->to(base_url('admin/dashboard'));
        }

        if ($username === 'teacher' && $password === 'password') {
            $session->set('isLoggedIn', true);
            $session->set('username', $username);
            $session->set('role', 'teacher');
            return redirect()->to(base_url('teacher/dashboard'));
        }

        // Try to authenticate against users table. Allow users to enter email as username.
        $db = \Config\Database::connect();
        $builder = $db->table('users');

        // First try to find by email
        $user = $builder->where('email', $username)->get()->getRowArray();

        // If not found and username contains no @, also try matching name or username field
        if (!$user && strpos($username, '@') === false) {
            $user = $builder->where('name', $username)->orWhere('username', $username)->get()->getRowArray();
        }

        if ($user && isset($user['password']) && password_verify($password, $user['password'])) {
            // Successful login
            $session->set('isLoggedIn', true);
            // Prefer email for username in session if available
            $session->set('username', $user['email'] ?? $user['name']);
            $session->set('role', $user['role'] ?? 'student');

            // Redirect based on role
            if ($session->get('role') === 'admin') {
                return redirect()->to(base_url('admin/dashboard'));
            }

            if ($session->get('role') === 'teacher') {
                return redirect()->to(base_url('teacher/dashboard'));
            }

            // Default student/other redirect
            return redirect()->to(base_url('announcements'));
        }

        // Invalid credentials
        return redirect()->back()->withInput()->with('error', 'Invalid credentials.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('message', 'Logged out successfully.');
    }
}
