<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // If user is not logged in, redirect to login page.
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(site_url('login'));
        }

        $role = $session->get('role');
        $uri = service('uri');
        $path = trim($uri->getPath(), '/');

        // If a logged-in user tries to access the login page, redirect them to their dashboard.
        if ($path === 'login') {
            switch ($role) {
                case 'admin':
                    return redirect()->to(site_url('admin/dashboard'));
                case 'teacher':
                    return redirect()->to(site_url('teacher/dashboard'));
                default:
                    return redirect()->to(site_url('announcements')); // Default for students
            }
        }

        // If a logged-in user tries to access the root URL, redirect them to their dashboard.
        if ($path === '') {
            switch ($role) {
                case 'admin':
                    return redirect()->to(site_url('admin/dashboard'));
                case 'teacher':
                    return redirect()->to(site_url('teacher/dashboard'));
                default:
                    return redirect()->to(site_url('announcements')); // Default for students
            }
        }

        // Role-based access control for specific routes
        switch ($role) {
            case 'admin':
                // Admins can only access admin routes.
                if (strpos($path, 'admin') === false) {
                    return redirect()->to(site_url('admin/dashboard'))->with('error', 'Access Denied.');
                }
                break;
            case 'teacher':
                // Teachers can access teacher routes and announcements.
                                if (strpos($path, 'teacher') === false && strpos($path, 'announcements') === false) {
                    return redirect()->to(site_url('teacher/dashboard'))->with('error', 'Access Denied.');
                }
                break;
            case 'student':
                // Students can access student routes and announcements.
                                if (strpos($path, 'student') === false && strpos($path, 'announcements') === false) {
                    return redirect()->to(site_url('announcements'))->with('error', 'Access Denied.');
                }
                break;
            default:
                // If role is not recognized, deny access and redirect to login.
                return redirect()->to(site_url('login'))->with('error', 'Invalid role.');
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
