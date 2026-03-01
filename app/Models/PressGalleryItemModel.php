<?php

namespace App\Models;

use CodeIgniter\Model;

class PressGalleryItemModel extends Model
{
    protected $table = 'press_gallery_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'subtitle', 'image', 'box_type', 'sort_order', 'is_active'];
    protected $useTimestamps = true;
}
