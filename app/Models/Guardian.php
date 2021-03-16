<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $table = "parent_info";
    public $timestamps = false;
    protected $primaryKey = 'pnt_Id';
    use HasFactory;
}
