<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    protected $table = "blood_group";
    public $timestamps = false;
    protected $primaryKey = 'bg_Id';
    use HasFactory;
}
