<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousExperience extends Model
{
    protected $table = "prev_experience";
    public $timestamps = false;
    protected $primaryKey = 'prev_exper_Id';
    protected $fillable = [];
    use HasFactory;
}
