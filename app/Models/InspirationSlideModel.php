<?php

namespace App\Models;

use CodeIgniter\Model;

class InspirationSlideModel extends Model
{
    protected $table = 'inspiration_slides';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'name', 'description', 'image', 'button_text', 'sort_order', 'is_active'];
    protected $useTimestamps = true;
}
