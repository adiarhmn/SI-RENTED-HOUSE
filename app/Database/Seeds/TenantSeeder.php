<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TenantSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name_tenant' => 'Rahman 01',
                'id_user' => 1,
                'telp' => "021839282301",
                'address' => 'Jl. Pelaihari No. 01',
            ],
            [
                'name_tenant' => 'Rahman 02',
                'id_user' => 1,
                'telp' => "02183928202",
                'address' => 'Jl. Pelaihari No. 01',
            ],
            [
                'name_tenant' => 'Rahman 03',
                'id_user' => 1,
                'telp' => "02183928203",
                'address' => 'Jl. Pelaihari No. 01',
            ],
            [
                'name_tenant' => 'Rahman 04',
                'id_user' => 1,
                'telp' => "02183928204",
                'address' => 'Jl. Pelaihari No. 01',
            ],
            [
                'name_tenant' => 'Rahman 05',
                'id_user' => 1,
                'telp' => "02183928205",
                'address' => 'Jl. Pelaihari No. 01',
            ],
        ];

        $this->db->table('tenant')->insertBatch($data);
    }
}
