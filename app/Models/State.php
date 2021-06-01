<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = "state";
    public $timestamps = false;
    protected $primaryKey = 'state_Id';
    use HasFactory;
}
