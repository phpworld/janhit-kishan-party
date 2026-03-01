<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeSliderModel extends Model
{
    protected $table = 'home_sliders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['headline', 'subheadline', 'image', 'layout', 'sort_order', 'is_active'];
    protected $useTimestamps = true;
}
