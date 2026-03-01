<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPdfToPages extends Migration
{
    public function up(): void
    {
        $this->forge->addColumn('cms_pages', [
            'pdf_file' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
                'after'      => 'sidebar_right_content',
            ],
            'pdf_label' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => 'View / Download PDF',
                'null'       => true,
                'after'      => 'pdf_file',
            ],
            'pdf_display' => [
                'type'       => 'ENUM',
                'constraint' => ['inline', 'download', 'both'],
                'default'    => 'both',
                'null'       => false,
                'after'      => 'pdf_label',
            ],
        ]);
    }

    public function down(): void
    {
        $this->forge->dropColumn('cms_pages', ['pdf_file', 'pdf_label', 'pdf_display']);
    }
}
