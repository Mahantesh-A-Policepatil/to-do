<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTasksTable extends Migration
{
//    public function up()
//    {
//        $this->forge->addField([
//            'id' => [
//                'type' => 'INT',
//                'auto_increment' => true
//            ],
//            'title' => [
//                'type' => 'VARCHAR',
//                'constraint' => '255'
//            ],
//            'created_at' => [
//                'type' => 'DATETIME',
//                'null' => true,
//            ]
//        ]);
//        $this->forge->addKey('id', true);
//        $this->forge->createTable('tasks');
//    }

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tasks');
    }


    public function down()
    {
        //
    }
}
