<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeInfo extends Model
{
    protected $table = "employee_info";
    public $timestamps = false;
    protected $primaryKey = 'emp_Id';
    use HasFactory;
}
