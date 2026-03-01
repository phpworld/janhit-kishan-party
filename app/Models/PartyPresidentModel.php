<?php

namespace App\Models;

use CodeIgniter\Model;

class PartyPresidentModel extends Model
{
    protected $table = 'party_presidents';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'tenure', 'image', 'sort_order', 'is_active'];
    protected $useTimestamps = true;
}
