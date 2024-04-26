<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTableKeperluanUser extends Migration
{
    public function up()
    {
        // Membuat struktur untuk tabel keperluan_user
        $this->forge->addField([
            'id'                 => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => false,
                'auto_increment' => true
            ],
            'user_id'           => [
                'type'           => 'INT',
                'constraint'     => '11',
                'unsigned'       => true,
                'null'           => false
            ],
            'keperluan'       => [
                'type'           => 'TINYTEXT',
                'null'           => false
            ],
            'waktu_mulai'         => [
                'type'           => 'TIMESTAMP',
                'default'        => new RawSql('CURRENT_TIMESTAMP'),
                'null'           => false
            ],
            'waktu_selesai'         => [
                'type'           => 'TIMESTAMP',
                'default'        => new RawSql('CURRENT_TIMESTAMP'),
                'null'           => true
            ],
            'durasi'         => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null'           => false
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat foreign key 
        $this->forge->addForeignKey('user_id', 'login', 'id');


        // Membuat tabel keperluan_user
        $this->forge->createTable('keperluan_user', TRUE);
    }

    public function down()
    {
        // menghapus tabel keperluan_user
        $this->forge->dropTable('keperluan_user');
    }
}