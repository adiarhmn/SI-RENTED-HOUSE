<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'rahman01',
                'password' => password_hash('pelaihari', PASSWORD_DEFAULT),
                'role' => 'penyewa',
            ],
            [

                'username' => 'rahman02',
                'password' => password_hash('pelaihari', PASSWORD_DEFAULT),
                'role' => 'penyewa',
            ],
            [
                'username' => 'rahman03',
                'password' => password_hash('pelaihari', PASSWORD_DEFAULT),
                'role' => 'penyewa',
            ],
            [
                'username' => 'rahman04',
                'password' => password_hash('pelaihari', PASSWORD_DEFAULT),
                'role' => 'penyewa',
            ],
            [
                'username' => 'rahman05',
                'password' => password_hash('pelaihari', PASSWORD_DEFAULT),
                'role' => 'penyewa',
            ],
            [
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role' => 'admin',
            ],
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
