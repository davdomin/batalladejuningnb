<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClient extends Migration
{

        public function up()
        {
                $this->forge->addField([
                        'cliente_id'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'name'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'password' => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',                                
                        ],
                        'email' => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',                                
                        ],
                        'email' => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',                                
                        ],
                        'created_at datetime default current_timestamp',
                        'deleted_at datetime default NULL',
                        'updated_at datetime default current_timestamp on update current_timestamp',
                        'deleted int default 0',
                ]);
                $this->forge->addKey('cliente_id', true);
                $this->forge->createTable('users');
        }

        public function down()
        {
                $this->forge->dropTable('users');
        }
}