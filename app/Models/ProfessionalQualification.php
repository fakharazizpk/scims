<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalQualification extends Model
{
    protected $table = "professional_qualification";
    public $timestamps = false;
    protected $primaryKey = 'prof_qual_Id';
    protected $fillable = [];
    use HasFactory;
}
