<?php

namespace App\Models;  
use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'password_resets',
        'created_at'
    ];
}
