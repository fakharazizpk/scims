<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\EmergencyContact;
use App\Models\StudentContact;
use App\Models\LastSchool;
use App\Models\Designation;
use App\Models\Disability;
use App\Models\Guardian;
use App\Models\Occupation;
use App\Models\Relationship;
use App\Models\School;
use App\Models\StudentCategory;
use Illuminate\Http\Request;
use App\Models\Religion;
use App\Models\StudentInfo;
use App\Models\AddClasses;
use App\Models\Gender;
use App\Models\BloodGroup;
use App\Models\Nationality;
use App\Models\District;
use App\Models\City;
use App\Models\Cast;
use Illuminate\Support\Facades\DB;
use Redirect, Response;


class StudentController extends Controller
{
    public function getstudent($id)
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
        return view('students');
    }


    public function create()
    {
        $classes = AddClasses::all();
        $genders = Gender::all();
        $bloodgroups = BloodGroup::all();
        $religions = Religion::all();
        $nationalities = Nationality::all();
        $districts = District::all();
        $cities = City::all();
        $casts = Cast::all();
        $student_categories = StudentCategory::all();
        $disabilities = Disability::all();
        $ralationship = Relationship::all();
        $occupations = Occupation::all();
        $designations = Designation::all();
        $guardians = Guardian::where('gnd_Id', '=', 1)->get();
        $mothers = Guardian::where('gnd_Id', '!=', 1)->get();

        return view('admission', compact('classes', 'genders', 'bloodgroups', 'religions', 'nationalities', 'districts', 'cities', 'casts', 'student_categories', 'disabilities', 'ralationship', 'designations', 'occupations', 'guardians', 'mothers'));
    }

    public function admissionInfo(Request $request)
    {
        //dd($request->all());

        if ($request->file('student_image')) {
            $student_image = $request->file('student_image');
            $new_student_image = "student" . time() . '.' . $student_image->getClientOriginalExtension();
            $student_image->move(public_path('upload/student'), $new_student_image);
            //echo "<pre>"; print_r($new_student_image); exit;
        } else {
            $new_student_image = "";
        }
        if ($request->file('previous_school_document')) {
            $school_image = $request->file('previous_school_document');
            $new_school_image = "document" . time() . '.' . $school_image->getClientOriginalExtension();
            $school_image->move(public_path('upload/school'), $new_school_image);
            //echo "<pre>"; print_r($new_school_image); exit;
        } else {
            $new_school_image = "";
        }

        $admission_no = School::select('school_abbreviation')->first();
        $i = DB::table('admission')->orderBy('adm_No', 'DESC')->first();
        if (!empty($i)) {
            $adminId = $i->adm_No;
        } else {
            $adminId = 0;
        }
        $admission_no = $admission_no->school_abbreviation . "-" . "2021" . "-" . ($adminId + 1);


        $admission_table = new Admission();
        $student_admission = new StudentInfo();
        $last_school = new LastSchool();
        /*admision Table*/
        $admission_table->adm_Number = $admission_no;
        $admission_table->adm_Date = $request->admdate;
        $admission_table->adm_Session = $request->admsession;
        $admission_table->reg_no = $request->regno;
        $admission_table->nadra_b = $request->nadrab;

        $admission_table->save();
        $admission_last_id = $admission_table->adm_No;
        //dd($admission_last_id);


        $last_school->lsch_Name = $request->previous_school_name;
        $last_school->lsch_contact_No = $request->previous_school_contact;
        $last_school->lsch_lv_Date = $request->previous_school_leaving_date;
        $last_school->lsch_class_Passed = $request->previous_school_class_passed;
        $last_school->lsch_Comments = $request->previous_school_comment;
        $last_school->save();
        $last_schcool_id = $last_school->lsch_Id;


        $student_emergency_table = new EmergencyContact();
        $student_emergency_table->emer_cont_Name = $request->student_emergency_name;
        $student_emergency_table->emer_cont_No = $request->student_emergency_phone;
        $student_emergency_table->fk_emer_relat_Id = $request->relation_with_student;
        $student_emergency_table->save();
        $student_emergency_last_id = $student_emergency_table->emer_cnt_Id;

        $student_Contact_table = new StudentContact();
        $student_Contact_table->pnt_mail_Add = $request->parent_mailing_address;
        $student_Contact_table->pnt_pmt_Add = $request->parent_permanent_address;
        $student_Contact_table->pnt_District = $request->parent_district;
        $student_Contact_table->pnt_City	 = $request->parent_city;
        $student_Contact_table->zip_No = $request->parent_zipcode;
        $student_Contact_table->pnt_mob_Ph = $request->guardian_mobile;
        $student_Contact_table->pnt_off_Ph = $request->guardian_office_phone;
        $student_Contact_table->pnt_home_Ph = $request->guardian_home_phone;
        $student_Contact_table->pnt_Email = $request->guardian_email;

        $student_Contact_table->mother_mobile = $request->mother_mobile;
        $student_Contact_table->mother_office_phone = $request->mother_office_phone;
        $student_Contact_table->mother_home_phone = $request->mother_home_phone;
        $student_Contact_table->mother_email = $request->mother_email;


        //dd($student_Contact_table);
        $student_Contact_table->save();
        $student_Contact_last_id = $student_Contact_table->pnt_cnt_Id;
        //dd($student_Contact_last_id);


        /*student info Table*/
        $student_admission->adm_No  = $admission_last_id;
        $student_admission->lsch_Id  = $last_schcool_id;
        $student_admission->emer_cnt_Id  = $student_emergency_last_id;
        $student_admission->fk_pnt_cnt_Id  = $student_Contact_last_id;


        $parentarray = [$request->guardian, $request->mother];

        //implode(",",$parentarray)
        $student_admission->parent_ids  = implode(",",$parentarray);

        //dump($student_Contact_last_id);
        $student_admission->std_Fname = $request->stdfname;
        $student_admission->std_Mname = $request->stdmname;
        $student_admission->std_Lname = $request->stdlname;
        $student_admission->std_Status = ($request->student_status == 'Active')? 'Active' : 'Inactive';

        //$student_admission->fk_pnt_cnt_Id = $request->class;
        $student_admission->cls_Id = $request->class_name;

        $student_admission->std_Img = $new_student_image;

        $student_admission->gnd_Id = $request->student_gender;
        $student_admission->std_Dob = $request->date_of_birth;
        $student_admission->bg_Id = $request->blood_group;
        $student_admission->relig_Id = $request->religion;
        $student_admission->nation_Id  = $request->nationality;
        $student_admission->dom_Id   = $request->student_district;
        $student_admission->std_Age = $request->age;
        $student_admission->cast_Id = $request->cast;
        $student_admission->disable_Id = $request->disability;
        $student_admission->std_cat_Id = $request->student_category;
        $student_admission->save();

        /*last school table*/



        /*student_contact table*/
        //$student_admission->pnt_cnt_Id  = $request->parent_mailing_address;

     /*      "mother_mobile" = $request->mother_mobile;
           "mother_office_phone" = $request->mother_office_phone;
           "mother_home_phone" = $request->mother_home_phone;
           "mother_email" = $request->mother_email;*/



    }

}
