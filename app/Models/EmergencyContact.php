<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    protected $table = "emergency_contact";
    public $timestamps = false;
    protected $primaryKey = 'emer_cnt_Id';
    use HasFactory;
}
