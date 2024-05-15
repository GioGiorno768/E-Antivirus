<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RemoveUserIdFromKeperluanUser extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropForeignKey('keperluan_user', 'keperluan_user_user_id_foreign');
        $this->forge->dropColumn('keperluan_user', 'user_id');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $fields = [
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'unsigned'       => true,
                'null'           => false
            ],
        ];

        $this->forge->addColumn('keperluan_user', $fields);
        $this->db->disableForeignKeyChecks();
        $this->forge->addForeignKey('user_id', 'login', 'id');
        $this->db->enableForeignKeyChecks();
    }
}
