<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TableKodeAksesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'kode' => password_hash('qwerty', PASSWORD_DEFAULT),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        print_r($data);
        $this->db->table('kode_akses')->insert($data);
    }
}
