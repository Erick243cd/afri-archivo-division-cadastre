<?php

namespace App\Database\Seeds;
use App\Libraries\Hash;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 5; $i++) { //to add 5 causes
            $this->db->table('users')->insert($this->generateUser());
        }
    }
    private function generateUser(): array
    {
        $faker = Factory::create();
        return [
            'u_firstname' => $faker->name(),
            'u_lastname' => $faker->name(),
            'u_email' => $faker->email(),
            'u_password' => Hash::make('@12345'),
            'phone' => $faker->phoneNumber(),
            'u_picture' => 'user-default-avatar.png'
        ];
    }
}
