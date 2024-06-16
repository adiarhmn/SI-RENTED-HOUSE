<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableDetailProperty extends Migration
{
    public function up()
    {
        //Create Table Detail Property
        $this->forge->addField([
            'id_detail_property' => [
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
            'description_detail' => [
                'type' => 'TEXT',
            ],
            'image_detail' => [
                'type' => 'TEXT',
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

        $this->forge->addKey('id_detail_property', true);
        $this->forge->addForeignKey('id_property', 'property', 'id_property', 'CASCADE', 'CASCADE');
        $this->forge->createTable('detail_property');
    }

    public function down()
    {
        $this->forge->dropTable('detail_property');
    }
}
