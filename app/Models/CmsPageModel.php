<?php

namespace App\Models;

use CodeIgniter\Model;

class CmsPageModel extends Model
{
    protected $table      = 'cms_pages';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'title',
        'slug',
        'content',
        'featured_image',
        'page_layout',
        'sidebar_left_source',
        'sidebar_left_content',
        'sidebar_right_source',
        'sidebar_right_content',
        'pdf_file',
        'pdf_label',
        'pdf_display',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'status',
    ];

    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    protected $validationRules = [
        'title' => 'required|max_length[255]',
        'slug'  => 'required|max_length[255]|is_unique[cms_pages.slug,id,{id}]',
    ];
}
