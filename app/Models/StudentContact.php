<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentContact extends Model
{
    protected $table = "student_contact";
    public $timestamps = false;
    protected $primaryKey = 'pnt_cnt_Id';
    use HasFactory;
}
