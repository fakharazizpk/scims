<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('teacher.dashboard');
    }
    public function Dairy()
    {
        return view('teacher.dairy');
    }

    public function TeacherProfile()
    {
        //dd(session()->all());
        //dd(Session::get('userData'));
        $teacher = DB::table('employee_info')
            ->leftjoin('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
            ->leftjoin('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
            ->leftjoin('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
            ->leftjoin('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
            ->leftjoin('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
            ->leftjoin('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
            ->leftjoin('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
            ->leftjoin('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
            ->leftjoin('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
            ->where('emp_Cnic', Session::get('userData')['username'])->first();
//        dd($teacher);
        return view('teacher.profile',compact('teacher'));
    }

    public function editProfile($id){
        $teacher = DB::table('employee_info')
            ->leftjoin('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
            ->leftjoin('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
            ->leftjoin('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
            ->leftjoin('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
            ->leftjoin('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
            ->leftjoin('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
            ->leftjoin('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
            ->leftjoin('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
            ->leftjoin('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
            ->where('emp_Cnic', Session::get('userData')['username'])->first();
//    dd($teacher);
        return view('teacher.editProfile',compact('teacher'));
    }
}
