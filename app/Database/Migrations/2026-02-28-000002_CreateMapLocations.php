<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMapLocations extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 160],
            'state'      => ['type' => 'VARCHAR', 'constraint' => 120],
            'lat'        => ['type' => 'DECIMAL', 'constraint' => '10,7'],
            'lng'        => ['type' => 'DECIMAL', 'constraint' => '10,7'],
            'is_active'  => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('map_locations');
    }

    public function down()
    {
        $this->forge->dropTable('map_locations', true);
    }
}
