<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TablePayment extends Migration
{
    public function up()
    {
        //Create Table Payment
        $this->forge->addField([
            'id_payment' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_rent' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'method_payment' => [
                'type' => 'ENUM',
                'constraint' => ['Cash', 'Transfer'],
            ],
            'total_payment' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'payment_status' => [
                'type' => 'ENUM',
                'constraint' => ['Pending', 'Success', 'Cancel'],
            ],
            'evidence_payment' => [
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

        $this->forge->addKey('id_payment', true);
        $this->forge->addForeignKey('id_rent', 'rent', 'id_rent', 'CASCADE', 'CASCADE');
        $this->forge->createTable('payment');
    }

    public function down()
    {
        $this->forge->dropTable('payment');
    }
}
