<?php

namespace App\Models;

use CodeIgniter\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title']; // 'created_at' will be auto
    protected $useTimestamps = true; // auto-fill created_at/updated_at
}
