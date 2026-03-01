<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactSubmissionModel extends Model
{
    protected $table      = 'contact_submissions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'email', 'phone', 'subject', 'message', 'is_read'];
    protected $useTimestamps = false;

    protected $validationRules = [
        'name'    => 'required|max_length[200]',
        'email'   => 'required|valid_email',
        'message' => 'required',
    ];
}
