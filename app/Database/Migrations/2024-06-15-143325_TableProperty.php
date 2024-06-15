<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableProperty extends Migration
{
    public function up()
    {
        //Create Table Property
        $this->forge->addField([
            'id_property' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'name_property' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'price_property' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'status_property' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
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

        $this->forge->addKey('id_property', true);
        $this->forge->createTable('property');
    }

    public function down()
    {
        //Delete Table Property
        $this->forge->dropTable('property');
    }
}
