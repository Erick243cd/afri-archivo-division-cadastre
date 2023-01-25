<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'u_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'u_firstname' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false
            ],
            'u_lastname' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false
            ],
            'u_email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
                'unique' => true,
            ],
            'u_role' => [
                'type' => 'ENUM',
                'constraint' => ['admin','archivist','user'],
                'default' => 'archivist'
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['active','desabled'],
                'default' => 'active'
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'u_password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'u_picture' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('u_id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
