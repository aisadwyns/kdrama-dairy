<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Aktor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'aktor_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'agensi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ],

        ]);
        $this->forge->addKey('aktor_id', true);
        $this->forge->createTable('aktor');
    }

    public function down()
    {
        $this->forge->dropTable('aktor');
    }
}
