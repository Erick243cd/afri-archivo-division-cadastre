<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role = [
            'role_type' => 'admin',
            'role_description'    => 'Can RWX and CRD'
        ];
        $this->db->table('roles')->insert($role);

        $role = [
            'role_type' => 'archivist',
            'role_description'    => 'Can RX'
        ];
        $this->db->table('roles')->insert($role);

        $role = [
            'role_type' => 'user',
            'role_description'    => 'Can RW'
        ];
        $this->db->table('roles')->insert($role);
    }
}
