<?php

namespace App\Models;

use CodeIgniter\Model;

class MapLocationModel extends Model
{
    protected $table      = 'map_locations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'state', 'lat', 'lng', 'is_active'];
    protected $useTimestamps = true;
}
