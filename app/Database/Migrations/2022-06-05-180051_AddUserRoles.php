<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserRoles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'role_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'role_type' => [
                'type' => 'ENUM',
                'constraint' => ['admin','archivist','user'],
                'null' => false
            ],
            'role_description' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('role_id');
        $this->forge->createTable('roles');
    }

    public function down()
    {
        $this->forge->dropTable("roles");
    }
}
