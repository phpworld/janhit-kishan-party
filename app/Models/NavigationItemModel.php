<?php

namespace App\Models;

use CodeIgniter\Model;

class NavigationItemModel extends Model
{
    protected $table = 'navigation_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['label', 'url', 'sort_order', 'is_active'];
    protected $useTimestamps = true;
}
