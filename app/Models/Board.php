<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = "boards";
    public $timestamps = false;
    protected $primaryKey = 'pk_board_Id';
    use HasFactory;
}
