<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKdramasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'judul'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'sutradara'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'penayangan'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'deskripsi'    => ['type' => 'TEXT'],
            'rate'         => ['type' => 'FLOAT', 'null' => true],
            'poster'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'kategori_id'  => ['type' => 'INT', 'unsigned' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('kategori_id', 'kategori_kdrama', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kdramas');
    }

    public function down()
    {
        $this->forge->dropTable('kdramas');
    }
}
