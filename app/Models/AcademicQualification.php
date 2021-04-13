<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicQualification extends Model
{
    protected $table = "academic_qualification";
    public $timestamps = false;
    protected $primaryKey = 'acdm_qual_Id';
    protected $fillable = [];
    use HasFactory;
}
