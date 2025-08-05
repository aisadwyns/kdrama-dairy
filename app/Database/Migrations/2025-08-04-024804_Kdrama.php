<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kdrama extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique'     => true,
            ],
            'sutradara' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'penayangan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'tahun_tayang' => [
                'type'       => 'INT',
                'constraint' => 4,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'rate' => [
                'type'       => 'FLOAT',
                'constraint' => '3,1',
            ],
            'poster' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'kategori_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
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

        $this->forge->addKey('id', true); // primary key
        $this->forge->addUniqueKey('slug'); // unique key untuk slug
        $this->forge->addForeignKey('kategori_id', 'kategori_kdrama', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kdrama');
    }

    public function down()
    {
        $this->forge->dropTable('kdrama');
    }
}
