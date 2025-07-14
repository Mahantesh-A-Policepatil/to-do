<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'created_at'];
    protected $useTimestamps = true; // auto-fill created_at/updated_at
}
