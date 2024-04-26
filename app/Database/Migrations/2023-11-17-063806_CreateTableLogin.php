<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTableLogin extends Migration
{
    public function up()
    {
        // Membuat struktur untuk tabel login
        $this->forge->addField([
            'id'                 => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => false,
                'auto_increment' => true
            ],
            'username'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => false
            ],
            'nama_lengkap'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => false
            ],
            'password'           => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => false
            ],
            'is_admin'           => [
                'type'           => 'TINYINT',
                'constraint'     => 1,
                'null'           => false
            ],
            'created_at'         => [
                'type'           => 'TIMESTAMP',
                'default'        => new RawSql('CURRENT_TIMESTAMP'),
                'null'           => false
            ],
            'updated_at'         => [
                'type'           => 'TIMESTAMP',
                'default'        => new RawSql('CURRENT_TIMESTAMP'),
                'null'           => true
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel login
        $this->forge->createTable('login', TRUE);
    }

    public function down()
    {
        // menghapus tabel login
        $this->forge->dropTable('login');
    }
}
