<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFotoToKeperluanUser extends Migration
{
    public function up()
    {
        $this->forge->addColumn('keperluan_user', [
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
                'after' => 'id',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('keperluan_user', 'foto');
    }
}
