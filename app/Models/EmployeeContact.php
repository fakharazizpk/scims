<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeContact extends Model
{
    protected $table = "employee_contact";
    public $timestamps = false;
    protected $primaryKey = 'emp_cnt_Id';
    use HasFactory;
}
