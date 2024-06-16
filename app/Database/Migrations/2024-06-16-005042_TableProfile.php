<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableProfile extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_profile' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'ENUM',
                'constraint' => ['VISI', 'ABOUT US', 'MISI', 'OUR TEAM', 'CONTACT US'],
            ],
            'content' => [
                'type' => 'TEXT',
            ]
        ]);

        $this->forge->addKey('id_profile', true);
        $this->forge->addUniqueKey('title');
        $this->forge->createTable('profile');
    }

    public function down()
    {
        $this->forge->dropTable('profile');
    }
}
