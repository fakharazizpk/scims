<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastSchool extends Model
{
    protected $table = "last_school";
    public $timestamps = false;
    protected $primaryKey = 'lsch_Id';
    use HasFactory;
}
