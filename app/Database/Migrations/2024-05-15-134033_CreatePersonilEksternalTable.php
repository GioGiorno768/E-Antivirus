<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePersonilEksternalTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'opd_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => false,
            ],
            'keperluan_user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('opd_id', 'master_opd', 'id_opd');
        $this->forge->addForeignKey('keperluan_user_id', 'keperluan_user', 'id');
        $this->forge->createTable('personil_eksternal', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('personil_eksternal');
    }
}
