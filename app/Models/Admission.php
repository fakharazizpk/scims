<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $table = "admission";
    public $timestamps = false;
    protected $primaryKey = 'adm_No';
    use HasFactory;
}
