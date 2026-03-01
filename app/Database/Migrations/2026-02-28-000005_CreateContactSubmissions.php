<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContactSubmissions extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT',     'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 200],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 200],
            'phone'      => ['type' => 'VARCHAR', 'constraint' => 30,  'null' => true],
            'subject'    => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            'message'    => ['type' => 'TEXT'],
            'is_read'    => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('contact_submissions');
    }

    public function down(): void
    {
        $this->forge->dropTable('contact_submissions', true);
    }
}
