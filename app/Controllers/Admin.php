<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function dashboard()
    {
        // Simple placeholder view - create app/Views/Admin/dashboard.php if you want a custom view
        return view('Admin/dashboard');
    }

    public function create_announcement()
    {
        return view('Admin/create_announcement');
    }

    public function store_announcement()
    {
        $announcementModel = new \App\Models\AnnouncementModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $announcementModel->save($data);

        return redirect()->to('/admin/dashboard')->with('success', 'Announcement created successfully!');
    }
}
