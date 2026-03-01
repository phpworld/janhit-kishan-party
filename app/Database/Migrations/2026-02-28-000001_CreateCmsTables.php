<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCmsTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 120],
            'email' => ['type' => 'VARCHAR', 'constraint' => 160, 'unique' => true],
            'password_hash' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('admin_users');

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'label' => ['type' => 'VARCHAR', 'constraint' => 120],
            'url' => ['type' => 'VARCHAR', 'constraint' => 255],
            'sort_order' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('navigation_items');

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'headline' => ['type' => 'VARCHAR', 'constraint' => 255],
            'subheadline' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'layout' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'right'],
            'sort_order' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('home_sliders');

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 160],
            'tenure' => ['type' => 'VARCHAR', 'constraint' => 160],
            'image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'sort_order' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('party_presidents');

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255, 'default' => 'OUR FOOTPRINTS'],
            'subtitle' => ['type' => 'VARCHAR', 'constraint' => 255, 'default' => 'KJP-led Alliance governs 21 states'],
            'states_governed' => ['type' => 'INT', 'constraint' => 11, 'default' => 21],
            'lok_sabha' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => '240/543'],
            'rajya_sabha' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => '99/245'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('footprint_settings');

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 120, 'default' => 'OUR INSPIRATION'],
            'name' => ['type' => 'VARCHAR', 'constraint' => 160],
            'description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'button_text' => ['type' => 'VARCHAR', 'constraint' => 60, 'default' => 'Read More'],
            'sort_order' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('inspiration_slides');

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 160],
            'subtitle' => ['type' => 'VARCHAR', 'constraint' => 160, 'null' => true],
            'image' => ['type' => 'VARCHAR', 'constraint' => 255],
            'box_type' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'medium'],
            'sort_order' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('press_gallery_items');
    }

    public function down()
    {
        $this->forge->dropTable('press_gallery_items', true);
        $this->forge->dropTable('inspiration_slides', true);
        $this->forge->dropTable('footprint_settings', true);
        $this->forge->dropTable('party_presidents', true);
        $this->forge->dropTable('home_sliders', true);
        $this->forge->dropTable('navigation_items', true);
        $this->forge->dropTable('admin_users', true);
    }
}
