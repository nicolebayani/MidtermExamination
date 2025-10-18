<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Welcome to Learnify Portal',
                'content' => 'This is the new online student portal. We are excited to have you here!',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Midterm Exams Schedule',
                'content' => 'Please check the academic calendar for the upcoming midterm examination schedule.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('announcements')->insertBatch($data);
    }
}
