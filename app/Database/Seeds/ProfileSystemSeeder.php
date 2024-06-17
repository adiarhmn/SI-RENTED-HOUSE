<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProfileSystemSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'slogan',
                'content' => 'Sistem Informasi Penyewaan Kos-kosan Terpecaya dan Mudah'
            ],
            [
                'title' => 'address',
                'content' => 'Jl. A Yani, Angsau, Pelaihari, Kabupaten Tanah Laut, Kalimantan Selatan 70812'
            ],
            [
                'title' => 'about',
                'content' => 'Memberikan kemudahan dalam mencari kos-kosan yang sesuai dengan kebutuhan anda'
            ],
            [
                'title' => 'telp',
                'content' => '0812-3456-7890'
            ],
            [
                'title' => 'email',
                'content' => 'adikost.pelaihari@gmail.com'
            ],
            [
                'title' => 'instagram',
                'content' => '@adikostpelaihari'
            ],
            [
                'title' => 'facebook',
                'content' => 'Adikost Pelaihari'
            ],
        ];

        // Using Query Builder
        $this->db->table('profile')->insertBatch($data);
    }
}
