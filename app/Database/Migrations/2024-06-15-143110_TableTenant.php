<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableTenant extends Migration
{
    public function up()
    {
        // Create Table Tenant
        $this->forge->addField([
            'id_tenant' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'name_tenant' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'telp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'address' => [
                'type' => 'TEXT',
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_tenant', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tenant');
    }

    public function down()
    {
        //Delete Table Tenant
        $this->forge->dropTable('tenant');
    }
}
