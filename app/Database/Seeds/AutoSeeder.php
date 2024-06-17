<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AutoSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('TenantSeeder');
        $this->call('ProfileSystemSeeder');
    }
}
