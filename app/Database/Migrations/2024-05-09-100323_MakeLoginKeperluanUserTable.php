<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MakeLoginKeperluanUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'           => [
                'type'           => 'INT',
                'constraint'     => '11',
                'unsigned'       => true,
                'null'           => false
            ],
            'keperluan_user_id'           => [
                'type'           => 'INT',
                'constraint'     => '11',
                'unsigned'       => true,
                'null'           => false
            ],
        ]);

        $this->forge->createTable('login_keperluan_user', TRUE);

    }

    public function down()
    {
        $this->forge->dropTable('login_keperluan_user');
    }
}
