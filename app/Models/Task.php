<?php

namespace App\Models;

use CodeIgniter\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $allowedFields = ['title', 'created_at'];
}
