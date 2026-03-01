<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPageLayoutToPages extends Migration
{
    public function up(): void
    {
        $fields = [
            'page_layout' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'default'    => 'site-width',
                'null'       => false,
                'after'      => 'featured_image',
            ],
            'sidebar_left_source' => [
                'type'       => 'ENUM',
                'constraint' => ['default', 'custom'],
                'default'    => 'default',
                'null'       => false,
                'after'      => 'page_layout',
            ],
            'sidebar_left_content' => [
                'type' => 'LONGTEXT',
                'null' => true,
                'after' => 'sidebar_left_source',
            ],
            'sidebar_right_source' => [
                'type'       => 'ENUM',
                'constraint' => ['default', 'custom'],
                'default'    => 'default',
                'null'       => false,
                'after'      => 'sidebar_left_content',
            ],
            'sidebar_right_content' => [
                'type' => 'LONGTEXT',
                'null' => true,
                'after' => 'sidebar_right_source',
            ],
        ];

        $this->forge->addColumn('cms_pages', $fields);
    }

    public function down(): void
    {
        $this->forge->dropColumn('cms_pages', [
            'page_layout',
            'sidebar_left_source',
            'sidebar_left_content',
            'sidebar_right_source',
            'sidebar_right_content',
        ]);
    }
}
