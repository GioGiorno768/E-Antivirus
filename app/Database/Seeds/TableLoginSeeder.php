<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TableLoginSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 2; $i++) {
            $gender = $faker->randomElements(['male', 'female'])[0];
            $username = $faker->firstName($gender);

            $data = [
                'username' => strtolower($username), 
                'nama_lengkap' => 'Admin '.$username,
                'password' => password_hash('qwerty', PASSWORD_DEFAULT),
                'is_admin' => $i,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
            print_r($data);
            $this->db->table('login')->insert($data);
        }
    }
}
