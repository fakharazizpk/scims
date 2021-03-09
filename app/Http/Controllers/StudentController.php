<?php

namespace App\Http\Controllers;

use App\Models\StudentInfo;
use Illuminate\Http\Request;
use Redirect,Response;


class StudentController extends Controller
{
    public function getstudent($id){

        $studentData = StudentInfo::where('cls_Id' ,$id)->get();
        return $studentData;

    }

}
