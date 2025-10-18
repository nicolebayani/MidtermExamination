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
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $role = $session->get('role');
        $uri = service('uri');

        // Admin access
        if ($role === 'admin') {
            return;
        }

        // Teacher access
        if ($role === 'teacher' && strpos($uri->getPath(), 'teacher') === 0) {
            return;
        }

        // Student access
        if ($role === 'student' && (strpos($uri->getPath(), 'student') === 0 || $uri->getPath() === 'announcements')) {
            return;
        }

        // Redirect if no access
        return redirect()->to(base_url('announcements'))->with('error', 'Access Denied: Insufficient Permissions');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
