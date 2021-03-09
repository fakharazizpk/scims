<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $table = "student_info";
    public $timestamps = false;
    protected $primaryKey = 'std_Id';
    use HasFactory;
}
