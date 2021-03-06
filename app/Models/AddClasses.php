<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddClasses extends Model
{
    protected $table = "class";
    public $timestamps = false;
    protected $primaryKey = 'cls_Id';
    use HasFactory;
}
