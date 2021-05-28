<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\EmloyeeInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect,Response;

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
            ->rightJoin('users', 'users.id', '=', 'employee_info.emp_id')
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

    public function editProfile(){
        $teacherprofile = DB::table('employee_info')
            ->leftjoin('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
            ->leftjoin('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
            ->rightJoin('users', 'users.id', '=', 'employee_info.emp_id')
            ->leftjoin('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
            ->leftjoin('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
            ->leftjoin('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
            ->leftjoin('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
            ->leftjoin('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
            ->leftjoin('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
            ->leftjoin('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
            ->where('emp_Cnic', Session::get('userData')['username'])->first();
//    dd($teacherprofile);
        return view('teacher.profile-edit',compact('teacherprofile'));
    }

    public function ProfileUpdate(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'user_image' => 'image|mimes:jpeg,png,jpg,png|max:1024',
            'email' => 'required|email',
            'phone' => 'required',
            'fath_name' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'blood_group' => 'required',
            'nationality' => 'required',
            'dob' => 'required',
            'religion' => 'required',
            'domicile' => 'required',
            'cast' => 'required',
            'city' => 'required',
            'emer_cont_name' => 'required',
            'emer_contact' => 'required',
            'em_contact_rel' => 'required'
        ]);


        $form_data1 = array(
//            'name'      => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        );
        $form_data2 = array(
            'fath_name'=> $request->fath_name,
            'emp_marital_Status'=> $request->marital_status,
            'blood_group' => $request->blood_group,
            'nationality' => $request->nationality,
            'emp_Dob' => $request->dob,
            'religion' => $request->religion,
            'dom_District' => $request->domicile,
            'cast' => $request->cast,
            'emp_City' => $request->city,
            'emer_cont_Name' => $request->emer_cont_name,
            'emer_cont_No' => $request->emer_contact,
            'fk_emer_relat_Id' => $request->em_contact_rel,
            'gnd_Id' => $request->gender

        );

        if ($request->hasFile('user_image')) {
            $user_image = $request->file('user_image');
            $new_user_image = "user" . time() . '.' . $user_image->getClientOriginalExtension();
            $user_image->move(public_path('upload/employee'), $new_user_image);
            $form_data['user_image'] = $new_user_image;
        }

        User::where('id',Session::get('userData')['id'])->update($form_data1);
//        Emloyee_info::where('id',Session::get('userData')['id'])->update($form_data2);
        $request->flash();
        return redirect()->back()->with('message', 'Successfully Updated!');

    }
}
