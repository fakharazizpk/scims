<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentInfo extends Model
{
    protected $table = "employment_info";
    public $timestamps = false;
    protected $primaryKey = 'empt_Id';
    use HasFactory;
}
