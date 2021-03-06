<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    protected $table = "class_section";
    public $timestamps = false;
    protected $primaryKey = 'c_section_Id';
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(StudentInfo::class, 'crep_Id', 'std_Id');
    }

}
