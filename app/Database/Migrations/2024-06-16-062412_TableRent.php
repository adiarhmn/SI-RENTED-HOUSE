<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableRent extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rent' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_property' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_tenant' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'total_tenant' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 1,
            ],
            'total_days' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'priceper_month' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'date_start' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'date_end' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status_rent' => [
                'type' => 'ENUM',
                'constraint' => ['PENDING', 'BERLANGSUNG', 'SELESAI'],
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

        $this->forge->addKey('id_rent', true);
        $this->forge->addForeignKey('id_property', 'property', 'id_property', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_tenant', 'tenant', 'id_tenant', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rent');
    }

    public function down()
    {
        $this->forge->dropTable('rent');
    }
}
