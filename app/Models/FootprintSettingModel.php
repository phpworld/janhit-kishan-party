<?php

namespace App\Models;

use CodeIgniter\Model;

class FootprintSettingModel extends Model
{
    protected $table = 'footprint_settings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'subtitle', 'states_governed', 'lok_sabha', 'rajya_sabha'];
    protected $useTimestamps = true;
}
