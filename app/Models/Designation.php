<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table = "designation";
    public $timestamps = false;
    protected $primaryKey = 'desig_Id';
    use HasFactory;
}
