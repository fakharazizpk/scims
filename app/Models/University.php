<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = "university_list";
    public $timestamps = false;
    protected $primaryKey = 'univ_Id';
    use HasFactory;
}
