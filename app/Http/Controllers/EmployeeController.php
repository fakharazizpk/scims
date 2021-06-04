<?php

namespace App\Http\Controllers;

use App\Models\AcademicQualification;
use App\Models\Admission;
use App\Models\EmergencyContact;
use App\Models\EmployeeType;
use App\Models\EmploymentInfo;
use App\Models\MaritalStatus;
use App\Models\PreviousExperience;
use App\Models\ProfessionalQualification;
use App\Models\EmployeeContact;
use App\Models\LastSchool;
use App\Models\Designation;
/*use App\Models\Disability;
use App\Models\Guardian;*/

use App\Models\Occupation;
use App\Models\Relationship;
/*use App\Models\School;*/

use App\Models\State;
use App\Models\StudentCategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Religion;
use App\Models\StudentInfo;
use App\Models\EmployeeInfo;
/*use App\Models\AddClasses;*/

use App\Models\Gender;
use App\Models\BloodGroup;
use App\Models\Nationality;
use App\Models\District;
use App\Models\City;
use App\Models\Cast;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Redirect, Response;


class EmployeeController extends Controller
{


    public function getState($id)
    {
        //dd($id);
        $states = DB::table("state")->where("nation_Id",$id)->pluck("state_name","state_Id");
        //dd($states);
        return json_encode($states);
    }
    public function getDistrict($id)
    {
        //dd($id);
        $district = DB::table("domicile")->where("nation_Id",$id)->pluck("dom_District","dom_Id");
        //dd($states);
        return json_encode($district);
    }
    public function getDistrictByState($id)
    {
        //dd($id);
        $district = DB::table("domicile")->where("state_Id",$id)->pluck("dom_District","dom_Id");
        //dd($states);
        return json_encode($district);
    }
    public function getCityByDistrict($id)
    {
        //dd($id);
        $district = DB::table("cities")->where("dom_Id",$id)->pluck("city_name","pk_city_id","zip_code");
        //dd($states);
        return json_encode($district);
    }
    public function getZipCode($id)
    {
        //dd($id);
        $district = DB::table("cities")->where("pk_city_id",$id)->pluck("zip_code");
        //dd($states);
        return json_encode($district);
    }

    public function getEmployee($id)
    {

        $studentData = StudentInfo::where('cls_Id', $id)->get();
        return $studentData;

    }

    /*  public function getstudentbysection($id){

             $studentData = StudentInfo::where('c_section_Id' ,$id)->get();
             return $studentData;

      }*/

    public function index()
    {

       /* if ($request->ajax()){
            $output = "";
            $query  = $request->search;
            //dd($query);
            if ($query==='All'){
                $employees = DB::table('employee_info')
                    ->leftjoin('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
                    ->leftjoin('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
                    ->leftjoin('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
                    ->leftjoin('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
                    ->leftjoin('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
                    ->leftjoin('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
                    ->leftjoin('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
                    ->leftjoin('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
                    ->leftjoin('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
                    ->get();
            }else{
                $employees = DB::table('employee_info')
                    ->leftjoin('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
                    ->leftjoin('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
                    ->leftjoin('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
                    ->leftjoin('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
                    ->leftjoin('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
                    ->leftjoin('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
                    ->leftjoin('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
                    ->leftjoin('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
                    ->leftjoin('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
                    ->where('employee_info.emp_Status', '=', $query)
                    ->get();
                //dd($employees);
            }


            if ($employees){
                return view('partials.employee_data', compact('employees'))->render();
            }
        } else {*/
            //dd($request->all());
            $employees = DB::table('employee_info')
                ->leftjoin('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
                ->leftjoin('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
                ->leftjoin('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
                ->leftjoin('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
                ->leftjoin('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
                ->leftjoin('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
                ->leftjoin('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
                ->leftjoin('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
                ->leftjoin('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
                ->get();
       // }

        return view('staff', compact('employees'));
    }


    public function EmployeeFilter(Request $request)
    {
        $query  = $request->search;
        if ($query == 'All'){
            $employees = DB::table('employee_info')
                ->leftjoin('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
                ->leftjoin('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
                ->leftjoin('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
                ->leftjoin('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
                ->leftjoin('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
                ->leftjoin('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
                ->leftjoin('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
                ->leftjoin('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
                ->leftjoin('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
                ->get();
        }else{
            $employees = DB::table('employee_info')
                ->leftjoin('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
                ->leftjoin('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
                ->leftjoin('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
                ->leftjoin('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
                ->leftjoin('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
                ->leftjoin('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
                ->leftjoin('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
                ->leftjoin('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
                ->leftjoin('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
                ->where('employee_info.emp_Status', '=', $query)
                ->get();
        }
        return view('staff', compact('employees'));

    }
    public function create()
    {
        //dd('dfhsdjaghsdghsd gsdjghsd');
        //$classes = AddClasses::all();
        $genders = Gender::all();
        //dd($genders);
        $marital_status = MaritalStatus::all();
        $bloodgroups = BloodGroup::all();
        $employee_types = EmployeeType::all();
        $designations = Designation::all();
        $ralationship = Relationship::all();
        $states = State::all();
        $districts = District::all();
        $cities = City::all();
        $religions = Religion::all();
        $nationalities = Nationality::all();
        $casts = Cast::all();

        return view('appointment', compact('marital_status', 'genders', 'bloodgroups', 'employee_types', 'designations', 'ralationship', 'districts', 'cities', 'religions', 'nationalities', 'casts','states'));
    }

    public function appointmentInfo(Request $request)
    {
        //dd($request->all());

        if ($request->file('employee_image')) {
            $employee_image = $request->file('employee_image');
            $new_employee_image = "emp" . time() . '.' . $employee_image->getClientOriginalExtension();
            $employee_image->move(public_path('upload/employee'), $new_employee_image);
        } else {
            $new_employee_image = "";
        }
        /*employee type Table*/
        $employee_contact_table = new EmployeeContact();
        $employee_contact_table->emp_mob_Ph = $request->employee_mobile_phone;
        $employee_contact_table->emp_home_Ph = $request->employee_home_phone;
        $employee_contact_table->emp_Email = $request->employee_email;
        $employee_contact_table->emp_mail_Add = $request->mailing_address;
        $employee_contact_table->emp_pmt_Add = $request->permanent_address;
        $employee_contact_table->emp_City = $request->employee_city;
        $employee_contact_table->emp_District = $request->district;
        $employee_contact_table->zip_Code = $request->zip_code;
        $employee_contact_table->save();
        $employee_contact_table_last_id = $employee_contact_table->emp_cnt_Id;

        /*Emergency Contact Table*/
        $employee_emergency_table = new EmergencyContact();
        $employee_emergency_table->emer_cont_Name = $request->emergency_contact_name;
        $employee_emergency_table->emer_cont_No = $request->emergency_contact_phone;
        $employee_emergency_table->fk_emer_relat_Id = $request->relation;
        $employee_emergency_table->other_relation = $request->other_relation;
        $employee_emergency_table->save();
        $employee_emergency_table_last_id = $employee_emergency_table->emer_cnt_Id;

        /*employee type Table*/
        $employee_type_table = new EmployeeType();
        $employee_type_table->emp_Type = $request->employee_type;
        $employee_type_table->desig_Id = $request->designation;
        $employee_type_table->save();
        $employee_type_last_id = $employee_type_table->emp_typ_Id;

        $count = count($request->qual_title);
        if ($count > 0) {
            $data[] = array("S.No" => $request->qual_sno[0], "Title" => $request->qual_title[0], "Board" => $request->qual_board[0], "Subject" => $request->qual_subject[0], "Session" => $request->qual_year[0], "Grade" => $request->qual_grade[0], "CGPA" => $request->qual_gpa[0]);
        }
        if ($count > 1) {
            $data[] = array("S.No" => $request->qual_sno[1], "Title" => $request->qual_title[1], "Board" => $request->qual_board[1], "Subject" => $request->qual_subject[1], "Session" => $request->qual_year[1], "Grade" => $request->qual_grade[1], "CGPA" => $request->qual_gpa[1]);
        }
        if ($count > 2) {
            $data[] = array("S.No" => $request->qual_sno[2], "Title" => $request->qual_title[2], "Board" => $request->qual_board[2], "Subject" => $request->qual_subject[2], "Session" => $request->qual_year[2], "Grade" => $request->qual_grade[2], "CGPA" => $request->qual_gpa[2]);
        }
        if ($count > 3) {
            $data[] = array("S.No" => $request->qual_sno[3], "Title" => $request->qual_title[3], "Board" => $request->qual_board[3], "Subject" => $request->qual_subject[3], "Session" => $request->qual_year[3], "Grade" => $request->qual_grade[3], "CGPA" => $request->qual_gpa[3]);
        }
        if ($count > 4) {
            $data[] = array("S.No" => $request->qual_sno[4], "Title" => $request->qual_title[4], "Board" => $request->qual_board[4], "Subject" => $request->qual_subject[4], "Session" => $request->qual_year[4], "Grade" => $request->qual_grade[4], "CGPA" => $request->qual_gpa[4]);
        }
        if ($count > 5) {
            $data[] = array("S.No" => $request->qual_sno[5], "Title" => $request->qual_title[5], "Board" => $request->qual_board[5], "Subject" => $request->qual_subject[5], "Session" => $request->qual_year[5], "Grade" => $request->qual_grade[5], "CGPA" => $request->qual_gpa[5]);
        }
        if ($count > 6) {
            $data[] = array("S.No" => $request->qual_sno[6], "Title" => $request->qual_title[6], "Board" => $request->qual_board[6], "Subject" => $request->qual_subject[6], "Session" => $request->qual_year[6], "Grade" => $request->qual_grade[6], "CGPA" => $request->qual_gpa[6]);
        }
        if ($count > 7) {
            $data[] = array("S.No" => $request->qual_sno[7], "Title" => $request->qual_title[7], "Board" => $request->qual_board[7], "Subject" => $request->qual_subject[7], "Session" => $request->qual_year[7], "Grade" => $request->qual_grade[7], "CGPA" => $request->qual_gpa[7]);
        }
        if ($count > 8) {
            $data[] = array("S.No" => $request->qual_sno[8], "Title" => $request->qual_title[8], "Board" => $request->qual_board[8], "Subject" => $request->qual_subject[8], "Session" => $request->qual_year[8], "Grade" => $request->qual_grade[8], "CGPA" => $request->qual_gpa[8]);
        }

        $serialized_academic_array = serialize($data);

        $profcount = count($request->prof_qual_title);
        if ($profcount > 0) {
            $data1[] = array("S.No" => $request->prof_qual_sno[0], "Title" => $request->prof_qual_title[0], "Board" => $request->prof_qual_board[0], "Session" => $request->prof_qual_year[0]);
        }
        if ($profcount > 1) {
            $data1[] = array("S.No" => $request->prof_qual_sno[1], "Title" => $request->prof_qual_title[1], "Board" => $request->prof_qual_board[1], "Session" => $request->prof_qual_year[1]);
        }
        if ($profcount > 2) {
            $data1[] = array("S.No" => $request->prof_qual_sno[2], "Title" => $request->prof_qual_title[2], "Board" => $request->prof_qual_board[2], "Session" => $request->prof_qual_year[2]);
        }
        if ($profcount > 3) {
            $data1[] = array("S.No" => $request->prof_qual_sno[3], "Title" => $request->prof_qual_title[3], "Board" => $request->prof_qual_board[3], "Session" => $request->prof_qual_year[3]);
        }
        if ($profcount > 4) {
            $data1[] = array("S.No" => $request->prof_qual_sno[4], "Title" => $request->prof_qual_title[4], "Board" => $request->prof_qual_board[4], "Session" => $request->prof_qual_year[4]);
        }

        $serialized_professional_array = serialize($data1);

        $expcount = count($request->experience_organization);
        if ($expcount > 0) {
            $data_exp[] = array("s_no" => $request->experience_sno[0], "organization" => $request->experience_organization[0], "position" => $request->experience_position[0], "role" => $request->experience_role[0], "from_date" => $request->experience_from_date[0], "to_date" => $request->experience_to_date[0]);
        }
        if ($expcount > 1) {
            $data_exp[] = array("s_no" => $request->experience_sno[1], "organization" => $request->experience_organization[1], "position" => $request->experience_position[1], "role" => $request->experience_role[1], "from_date" => $request->experience_from_date[1], "to_date" => $request->experience_to_date[1]);
        }
        if ($expcount > 2) {
            $data_exp[] = array("s_no" => $request->experience_sno[2], "organization" => $request->experience_organization[2], "position" => $request->experience_position[2], "role" => $request->experience_role[2], "from_date" => $request->experience_from_date[2], "to_date" => $request->experience_to_date[2]);
        }
        if ($expcount > 3) {
            $data_exp[] = array("s_no" => $request->experience_sno[3], "organization" => $request->experience_organization[3], "position" => $request->experience_position[3], "role" => $request->experience_role[3], "from_date" => $request->experience_from_date[3], "to_date" => $request->experience_to_date[3]);
        }
        if ($expcount > 4) {
            $data_exp[] = array("s_no" => $request->experience_sno[4], "organization" => $request->experience_organization[4], "position" => $request->experience_position[4], "role" => $request->experience_role[4], "from_date" => $request->experience_from_date[4], "to_date" => $request->experience_to_date[4]);
        }

        $serialized_experience_array = serialize($data_exp);

        /*Employment Info Table*/
        $employment_info_table = new EmploymentInfo();
        $employment_info_table->personal_No = rand(1000, 1000000000);
        $employment_info_table->appt_Date = $request->hire_date;
        $employment_info_table->adjust_Date = $request->adjustment_date;
        $employment_info_table->empt_Status = $request->employee_status;
        $employment_info_table->contract_Type = $request->contract_type;
        $employment_info_table->contract_Duration = $request->staff_contract_duration;
        $employment_info_table->save();
        $employment_info_table_last_id = $employment_info_table->empt_Id;


        /*Enployee Info Table*/
        $employee_info_table = new EmployeeInfo();
        $employee_info_table->emp_Img = $new_employee_image;
        $employee_info_table->emp_given_name = $request->given_name;
        $employee_info_table->emp_surname = $request->surname;
        $employee_info_table->emp_fat_Name = $request->father;
        $employee_info_table->gnd_Id = $request->gender;
        $employee_info_table->emp_marital_Status = $request->marital_status;
        $employee_info_table->bg_Id = $request->blood_group;
        $employee_info_table->emp_Cnic = $request->staff_cnic;
        $employee_info_table->emp_Dob = $request->date_of_birth;
        $employee_info_table->relig_Id = $request->religion;
        $employee_info_table->nation_Id = $request->nationality;
        $employee_info_table->country_Id = $request->country;
        $employee_info_table->state_Id = $request->state;
        $employee_info_table->city_Id = $request->employee_city;
        $employee_info_table->dom_Id = $request->employee_district;
        $employee_info_table->cast_Id = $request->staff_cast;
        $employee_info_table->emp_Status = ($request->employee_status) ? 'Active' : 'Inactive';
        /*last id's of another table start*/
        $employee_info_table->emp_typ_Id = $employee_type_last_id;
        $employee_info_table->emer_cnt_Id = $employee_emergency_table_last_id;
        $employee_info_table->empt_Id = $employment_info_table_last_id;
        $employee_info_table->academic = $serialized_academic_array;
        $employee_info_table->professional = $serialized_professional_array;
        $employee_info_table->experience = $serialized_experience_array;
        $employee_info_table->emp_cnt_Id = $employee_contact_table_last_id;
        /*last id's of another table end*/

        $employee_info_table->save();

        $user = new User();
        $user->name = $request->given_name;
        $user->user_type = $request->designation;
        $user->username = $request->staff_cnic;
        $user->status = ($request->employee_status) ? 'Active' : 'Inactive';
        $user->password = Hash::make($request->staff_cnic);
        $user->save();

        //$employee_last_id = $employee_info_table->emp_Id;
        /* Academic Qualification Table */

    }

    public function EditAppointmentInfo($id)
    {
        $genders = Gender::all();
        //dd($genders);
        $marital_status = MaritalStatus::all();
        $bloodgroups = BloodGroup::all();
        $employee_types = EmployeeType::all();
        $designations = Designation::all();
        $ralationship = Relationship::all();
        $districts = District::all();
        $cities = City::all();
        $states = State::all();
        $religions = Religion::all();
        $nationalities = Nationality::all();
        $casts = Cast::all();
        $employee = DB::table('employee_info')
            ->leftjoin('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
            ->leftjoin('employee_type', 'employee_info.emp_typ_Id', '=', 'employee_type.emp_typ_Id')
            ->leftjoin('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
            ->leftjoin('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
            ->leftjoin('state', 'employee_info.state_Id', '=', 'state.state_Id')
            ->leftjoin('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
            ->leftjoin('cities', 'employee_info.city_Id', '=', 'cities.pk_city_id')
            ->leftjoin('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
            ->leftjoin('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
            ->leftjoin('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
            ->leftjoin('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
            ->leftjoin('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
            ->where('employee_info.emp_Id', $id)->first();
        //dd($employee->state_name);
        //$studentParent = explode(",", $student->parent_ids);
        return view('edit-appointment-info', compact('employee', 'employee_types', 'genders', 'marital_status', 'bloodgroups', 'religions', 'nationalities', 'districts', 'cities', 'casts', 'ralationship', 'designations','states'));
    }

    public function UpdateAppointmentInfo(Request $request)
    {
        //dd($request->all());
        $employment_info_table = [
            'appt_Date' => $request->hire_date,
            'adjust_Date' => $request->adjustment_date,
            'empt_Status' => $request->employee_status,
            'contract_Type' => $request->contract_type,
            'contract_Duration' => $request->staff_contract_duration,
        ];

        EmploymentInfo::where('empt_Id', $request->empt_id)->update($employment_info_table);

        //dd($employment_info_table);

        $count = count($request->qual_title);
        if ($count > 0) {
            $data[] = array("S.No" => $request->qual_sno[0], "Title" => $request->qual_title[0], "Board" => $request->qual_board[0], "Subject" => $request->qual_subject[0], "Session" => $request->qual_year[0], "Grade" => $request->qual_grade[0], "CGPA" => $request->qual_gpa[0]);
        }
        if ($count > 1) {
            $data[] = array("S.No" => $request->qual_sno[1], "Title" => $request->qual_title[1], "Board" => $request->qual_board[1], "Subject" => $request->qual_subject[1], "Session" => $request->qual_year[1], "Grade" => $request->qual_grade[1], "CGPA" => $request->qual_gpa[1]);

        }

        if ($count > 2) {
            $data[] = array("S.No" => $request->qual_sno[2], "Title" => $request->qual_title[2], "Board" => $request->qual_board[2], "Subject" => $request->qual_subject[2], "Session" => $request->qual_year[2], "Grade" => $request->qual_grade[2], "CGPA" => $request->qual_gpa[2]);

        }
        if ($count > 3) {
            $data[] = array("S.No" => $request->qual_sno[3], "Title" => $request->qual_title[3], "Board" => $request->qual_board[3], "Subject" => $request->qual_subject[3], "Session" => $request->qual_year[3], "Grade" => $request->qual_grade[3], "CGPA" => $request->qual_gpa[3]);

        }
        if ($count > 4) {
            $data[] = array("S.No" => $request->qual_sno[4], "Title" => $request->qual_title[4], "Board" => $request->qual_board[4], "Subject" => $request->qual_subject[4], "Session" => $request->qual_year[4], "Grade" => $request->qual_grade[4], "CGPA" => $request->qual_gpa[4]);

        }
        if ($count > 5) {
            $data[] = array("S.No" => $request->qual_sno[5], "Title" => $request->qual_title[5], "Board" => $request->qual_board[5], "Subject" => $request->qual_subject[5], "Session" => $request->qual_year[5], "Grade" => $request->qual_grade[5], "CGPA" => $request->qual_gpa[5]);

        }
        if ($count > 6) {
            $data[] = array("S.No" => $request->qual_sno[6], "Title" => $request->qual_title[6], "Board" => $request->qual_board[6], "Subject" => $request->qual_subject[6], "Session" => $request->qual_year[6], "Grade" => $request->qual_grade[6], "CGPA" => $request->qual_gpa[6]);

        }
        if ($count > 7) {
            $data[] = array("S.No" => $request->qual_sno[7], "Title" => $request->qual_title[7], "Board" => $request->qual_board[7], "Subject" => $request->qual_subject[7], "Session" => $request->qual_year[7], "Grade" => $request->qual_grade[7], "CGPA" => $request->qual_gpa[7]);

        }
        if ($count > 8) {
            $data[] = array("S.No" => $request->qual_sno[8], "Title" => $request->qual_title[8], "Board" => $request->qual_board[8], "Subject" => $request->qual_subject[8], "Session" => $request->qual_year[8], "Grade" => $request->qual_grade[8], "CGPA" => $request->qual_gpa[8]);

        }
        //dd($data);
        $serialized_academic_array = serialize($data);
        //dd(unserialize($serialized_academic_array));

        $profcount = count($request->prof_qual_title);
        if ($profcount > 0) {
            $data1[] = array("S.No" => $request->prof_qual_sno[0], "Title" => $request->prof_qual_title[0], "Board" => $request->prof_qual_board[0], "Session" => $request->prof_qual_year[0]);
        }
        if ($profcount > 1) {
            $data1[] = array("S.No" => $request->prof_qual_sno[1], "Title" => $request->prof_qual_title[1], "Board" => $request->prof_qual_board[1], "Session" => $request->prof_qual_year[1]);
        }
        if ($profcount > 2) {
            $data1[] = array("S.No" => $request->prof_qual_sno[2], "Title" => $request->prof_qual_title[2], "Board" => $request->prof_qual_board[2], "Session" => $request->prof_qual_year[2]);
        }
        if ($profcount > 3) {
            $data1[] = array("S.No" => $request->prof_qual_sno[3], "Title" => $request->prof_qual_title[3], "Board" => $request->prof_qual_board[3], "Session" => $request->prof_qual_year[3]);
        }
        if ($profcount > 4) {
            $data1[] = array("S.No" => $request->prof_qual_sno[4], "Title" => $request->prof_qual_title[4], "Board" => $request->prof_qual_board[4], "Session" => $request->prof_qual_year[4]);
        }

        $serialized_professional_array = serialize($data1);
        //dd($serialized_professional_array);

        $expcount = count($request->experience_organization);
        if ($expcount > 0) {
            $data_exp[] = array("s_no" => $request->experience_sno[0], "organization" => $request->experience_organization[0], "position" => $request->experience_position[0], "role" => $request->experience_role[0], "from_date" => $request->experience_from_date[0], "to_date" => $request->experience_to_date[0]);
        }
        if ($expcount > 1) {
            $data_exp[] = array("s_no" => $request->experience_sno[1], "organization" => $request->experience_organization[1], "position" => $request->experience_position[1], "role" => $request->experience_role[1], "from_date" => $request->experience_from_date[1], "to_date" => $request->experience_to_date[1]);
        }
        if ($expcount > 2) {
            $data_exp[] = array("s_no" => $request->experience_sno[2], "organization" => $request->experience_organization[2], "position" => $request->experience_position[2], "role" => $request->experience_role[2], "from_date" => $request->experience_from_date[2], "to_date" => $request->experience_to_date[2]);
        }
        if ($expcount > 3) {
            $data_exp[] = array("s_no" => $request->experience_sno[3], "organization" => $request->experience_organization[3], "position" => $request->experience_position[3], "role" => $request->experience_role[3], "from_date" => $request->experience_from_date[3], "to_date" => $request->experience_to_date[3]);
        }
        if ($expcount > 4) {
            $data_exp[] = array("s_no" => $request->experience_sno[4], "organization" => $request->experience_organization[4], "position" => $request->experience_position[4], "role" => $request->experience_role[4], "from_date" => $request->experience_from_date[4], "to_date" => $request->experience_to_date[4]);
        }

        $serialized_experience_array = serialize($data_exp);
        if ($request->file('employee_image')) {
            $employee_image = $request->file('employee_image');
            $new_employee_image = "emp" . time() . '.' . $employee_image->getClientOriginalExtension();
            $employee_image->move(public_path('upload/employee'), $new_employee_image);
            //echo "<pre>"; print_r($new_student_image); exit;
            //$employee_info_array["emp_Img"] = $new_employee_image;

            $employee_info_array = [

                'emp_given_name' => $request->given_name,
                'emp_surname' => $request->surname,
                'emp_Img' => $new_employee_image,
                'emp_fat_Name' => $request->father,
                'gnd_Id' => $request->gender,
                'emp_marital_Status' => $request->marital_status,
                'bg_Id' => $request->blood_group,
                'emp_Cnic' => $request->staff_cnic,
                'emp_Dob' => $request->date_of_birth,
                'relig_Id' => $request->religion,
                'nation_Id' => $request->nationality,
                'country_Id' => $request->country,
                'state_Id' => $request->state,
                'dom_Id' => $request->employee_district,
                'pk_city_id' => $request->employee_city,
                'cast_Id' => $request->staff_cast,
                'emp_Status' => ($request->employee_status) ? 'Active' : 'Inactive',
                /*last id's of another table start*/
                'emp_typ_Id' => $request->emp_typ_Id,
                'emer_cnt_Id' => $request->e_id,
                'empt_Id' => $request->empt_id,
                'academic' => $serialized_academic_array,
                'professional' => $serialized_professional_array,
                'experience' => $serialized_experience_array,
                'emp_cnt_Id' => $request->emp_cnt_Id,

            ];
        }else{
            $employee_info_array = [
                'emp_given_name' => $request->given_name,
                'emp_surname' => $request->surname,
                'emp_fat_Name' => $request->father,
                'gnd_Id' => $request->gender,
                'emp_marital_Status' => $request->marital_status,
                'bg_Id' => $request->blood_group,
                'emp_Cnic' => $request->staff_cnic,
                'emp_Dob' => $request->date_of_birth,
                'relig_Id' => $request->religion,
                'nation_Id' => $request->nationality,
                'country_Id' => $request->country,
                'state_Id' => $request->state,
                'dom_Id' => $request->employee_district,
                'cast_Id' => $request->staff_cast,
                'emp_Status' => ($request->employee_status) ? 'Active' : 'Inactive',
                /*last id's of another table start*/
                'emp_typ_Id' => $request->emp_typ_Id,
                'emer_cnt_Id' => $request->e_id,
                'empt_Id' => $request->empt_id,
                'academic' => $serialized_academic_array,
                'professional' => $serialized_professional_array,
                'experience' => $serialized_experience_array,
                'emp_cnt_Id' => $request->emp_cnt_Id,

            ];
        }
        //dd($employee_info_array);
        EmployeeInfo::where('emp_Id', $request->emp_id)->update($employee_info_array);


        /*Emergency Contact Table*/
        $employee_emergency_array = [
            'emer_cont_Name' => $request->emergency_contact_name,
            'emer_cont_No' => $request->emergency_contact_phone,
            'fk_emer_relat_Id' => $request->relation,
            'other_relation' => $request->other_relation,
        ];
        //dd($student_emergency_array);
        EmergencyContact::where('emer_cnt_Id', $request->e_id)->update($employee_emergency_array);

        $employee_contact_array = [
            'emp_mob_Ph' => $request->employee_mobile_phone,
            'emp_home_Ph' => $request->employee_home_phone,
            'emp_Email' => $request->employee_email,
            'emp_mail_Add' => $request->mailing_address,
            'emp_pmt_Add' => $request->permanent_address,

            'emp_City' => $request->employee_city,
            'emp_District' => $request->district,
            'zip_Code' => $request->zip_code,
        ];
        EmployeeContact::where('emp_cnt_Id', $request->emp_cnt_Id)->update($employee_contact_array);
    }


    public function ChangeEmployeeStatus(Request $request)
    {
        $student = EmployeeInfo::where('emp_Id', $request->id)->first();
        //dd($request->id);
        if ($student->emp_Status == 'Active') {
            $student_status_array = [
                'emp_Status' => 'Inactive'
            ];
        } elseif ($student->emp_Status == 'Inactive') {
            $student_status_array = [
                'emp_Status' => 'Active'
            ];
        }

        $student_status = EmployeeInfo::where('emp_Id', $request->id)->update($student_status_array);

        return redirect()->back()->with('message', 'Successfully Change Status!');
    }


}
