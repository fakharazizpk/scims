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
use App\Models\ClassSection;
use App\Models\Gender;
use App\Models\BloodGroup;
use App\Models\Nationality;
use App\Models\District;
use App\Models\City;
use App\Models\Cast;
use App\Models\WithdrawlStudent;
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

        $classes = AddClasses::all();
        $class_sections = ClassSection::all();
        $students = DB::table('student_info')
            ->leftJoin('student_contact', 'student_info.fk_pnt_cnt_Id', '=', 'student_contact.pnt_cnt_Id')
            ->leftJoin('gender', 'student_info.gnd_Id', '=', 'gender.gnd_Id')
            ->leftJoin('nationality', 'student_info.nation_Id', '=', 'nationality.nation_Id')
            ->leftJoin('domicile', 'student_info.dom_Id', '=', 'domicile.dom_Id')
            ->leftJoin('cast', 'student_info.cast_Id', '=', 'cast.cast_Id')
            ->leftJoin('blood_group', 'student_info.bg_Id', '=', 'blood_group.bg_Id')
            ->leftJoin('religion', 'student_info.relig_Id', '=', 'religion.relig_Id')
            ->leftJoin('student_category', 'student_info.std_cat_Id', '=', 'student_category.std_cat_Id')
            ->leftJoin('disable', 'student_info.disable_Id', '=', 'disable.disable_Id')
            ->leftJoin('emergency_contact', 'student_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
            ->leftJoin('admission', 'student_info.adm_No', '=', 'admission.adm_No')
            ->leftJoin('last_school', 'student_info.lsch_Id', '=', 'last_school.lsch_Id')
            ->leftJoin('class', 'student_info.cls_Id', '=', 'class.cls_Id')
            ->get();
        //dd($students);

        //$parents = $students[0]->parent_ids;

        //$parents = explode(',',$students[0]->parent_ids);
        //dd(array_values($parents)[0]);

        /*foreach($students->parent_ids as $p_id)
            {
                echo $p_id;
            }*/

        return view('students', compact('students','classes', 'class_sections'));
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

            /*last school table*/
            $last_school->lsch_Name = $request->previous_school_name;
            $last_school->lsch_slc_img = $new_school_image;
            $last_school->lsch_contact_No = $request->previous_school_contact;
            $last_school->lsch_lv_Date = $request->previous_school_leaving_date;
            $last_school->lsch_class_Passed = $request->previous_school_class_passed;
            $last_school->lsch_Comments = $request->previous_school_comment;
            $last_school->save();
            $last_schcool_id = $last_school->lsch_Id;

            /*Emergency Contact Table*/
            $student_emergency_table = new EmergencyContact();
            $student_emergency_table->emer_cont_Name = $request->student_emergency_name;
            $student_emergency_table->emer_cont_No = $request->student_emergency_phone;
            $student_emergency_table->fk_emer_relat_Id = $request->relation_with_student;
            $student_emergency_table->save();
            $student_emergency_last_id = $student_emergency_table->emer_cnt_Id;

            /*student_Contact table*/
            $student_Contact_table = new StudentContact();
            $student_Contact_table->pnt_mail_Add = $request->parent_mailing_address;
            $student_Contact_table->pnt_pmt_Add = $request->parent_permanent_address;
            $student_Contact_table->pnt_District = $request->parent_district;
            $student_Contact_table->pnt_City = $request->parent_city;
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
            $student_admission->adm_No = $admission_last_id;
            $student_admission->lsch_Id = $last_schcool_id;
            $student_admission->emer_cnt_Id = $student_emergency_last_id;
            $student_admission->fk_pnt_cnt_Id = $student_Contact_last_id;
            $parentarray = [$request->guardian, $request->mother];
            //implode(",",$parentarray)
            $student_admission->parent_ids = implode(",", $parentarray);

            //dump($student_Contact_last_id);
            $student_admission->std_Fname = $request->stdfname;
            $student_admission->std_Mname = $request->stdmname;
            $student_admission->std_Lname = $request->stdlname;
            $student_admission->std_Status = ($request->student_status == 'Active') ? 'Active' : 'Inactive';

            //$student_admission->fk_pnt_cnt_Id = $request->class;
            $student_admission->cls_Id = $request->class_name;

            $student_admission->std_Img = $new_student_image;

            $student_admission->gnd_Id = $request->student_gender;
            $student_admission->std_Dob = $request->date_of_birth;
            $student_admission->bg_Id = $request->blood_group;
            $student_admission->relig_Id = $request->religion;
            $student_admission->nation_Id = $request->nationality;
            $student_admission->dom_Id = $request->student_district;
            $student_admission->std_Age = $request->age;
            $student_admission->cast_Id = $request->cast;
            $student_admission->disable_Id = $request->disability;
            $student_admission->std_cat_Id = $request->student_category;
            $student_admission->save();


    }

    public function EditAdmissionInfo($id)
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
        $student = DB::table('student_info')
            ->join('student_contact', 'student_info.fk_pnt_cnt_Id', '=', 'student_contact.pnt_cnt_Id')
            ->join('gender', 'student_info.gnd_Id', '=', 'gender.gnd_Id')
            ->join('nationality', 'student_info.nation_Id', '=', 'nationality.nation_Id')
            ->join('domicile', 'student_info.dom_Id', '=', 'domicile.dom_Id')
            ->join('cast', 'student_info.cast_Id', '=', 'cast.cast_Id')
            ->join('blood_group', 'student_info.bg_Id', '=', 'blood_group.bg_Id')
            ->join('religion', 'student_info.relig_Id', '=', 'religion.relig_Id')
            ->join('student_category', 'student_info.std_cat_Id', '=', 'student_category.std_cat_Id')
            ->join('disable', 'student_info.disable_Id', '=', 'disable.disable_Id')
            ->join('emergency_contact', 'student_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
            ->join('admission', 'student_info.adm_No', '=', 'admission.adm_No')
            ->join('last_school', 'student_info.lsch_Id', '=', 'last_school.lsch_Id')
            ->join('class', 'student_info.cls_Id', '=', 'class.cls_Id')
            ->where('student_info.std_Id', $id)->first();
        //dd($student);

        $studentParent = explode(",", $student->parent_ids);
       /* $Guardian_image = Guardian::whereIn('gnd_Id', $studentParent)->get();
        dd($Guardian_image);*/
        return view('edit-admission-info', compact('student', 'studentParent', 'classes', 'genders', 'bloodgroups', 'religions', 'nationalities', 'districts', 'cities', 'casts', 'student_categories', 'disabilities', 'ralationship', 'designations', 'occupations', 'guardians', 'mothers'));
    }

    public function UpdateAdmissionInfo(Request $request)
    {
        //dd($request->input('p_id'));

        $admission_no = School::select('school_abbreviation')->first();
        $i = DB::table('admission')->orderBy('adm_No', 'DESC')->first();
        if (!empty($i)) {
            $adminId = $i->adm_No;
        } else {
            $adminId = 0;
        }
        $admission_no = $admission_no->school_abbreviation . "-" . "2021" . "-" . ($adminId + 1);


        /* $admission_table = new Admission();
         $student_admission = new StudentInfo();
         $last_school = new LastSchool();*/
        /*admision Table*/
        $admissionArray = [
            'adm_Number' => $admission_no,
            'adm_Date' => $request->admdate,
            'adm_Session' => $request->admsession,
            'reg_no' => $request->regno,
            'nadra_b' => $request->nadrab,
        ];

        //dd($admissionArray);

        Admission::where('adm_No', $request->adm_id)->update($admissionArray);


        // $admission_last_id = $request->adm_id;
        //dd($admission_last_id);

        /*last school table*/

        if ($request->file('previous_school_document')) {
            $school_image = $request->file('previous_school_document');
            $new_school_image = "document" . time() . '.' . $school_image->getClientOriginalExtension();
            $school_image->move(public_path('upload/school'), $new_school_image);
            //echo "<pre>"; print_r($new_school_image); exit;
            $last_schoolarray['lsch_slc_img'] = $new_school_image;
            $last_schoolarray = [
                'lsch_Name' => $request->previous_school_name,
                'lsch_contact_No' => $request->previous_school_contact,
                'lsch_lv_Date' => $request->previous_school_leaving_date,
                'lsch_class_Passed' => $request->previous_school_class_passed,
                'lsch_Comments' => $request->previous_school_comment,
                'lsch_slc_img' => $new_school_image,

            ];
        }else{
            $last_schoolarray = [
                'lsch_Name' => $request->previous_school_name,
                'lsch_contact_No' => $request->previous_school_contact,
                'lsch_lv_Date' => $request->previous_school_leaving_date,
                'lsch_class_Passed' => $request->previous_school_class_passed,
                'lsch_Comments' => $request->previous_school_comment,

            ];
        }
        //dd($last_schoolarray);
        LastSchool::where('lsch_Id', $request->lsch_Id)->update($last_schoolarray);

        //$last_school->save();
        //$last_schcool_id = $last_school->lsch_Id;

        /*Emergency Contact Table*/
        $student_emergency_array = [
            'emer_cont_Name' => $request->student_emergency_name,
            'emer_cont_No' => $request->student_emergency_phone,
            'fk_emer_relat_Id' => $request->relation_with_student,
        ];
        //dd($student_emergency_array);

        EmergencyContact::where('emer_cnt_Id', $request->e_id)->update($student_emergency_array);

        //$student_emergency_table->save();
        $student_emergency_last_id = $request->emer_cnt_Id;

        /*student_Contact table*/
        //$student_Contact_table = new StudentContact();
        $Student_Contact_array = [
        'pnt_mail_Add' => $request->parent_mailing_address,
        'pnt_pmt_Add' => $request->parent_permanent_address,
        'pnt_District' => $request->parent_district,
        'pnt_City' => $request->parent_city,
        'zip_No' => $request->parent_zipcode,
        'pnt_mob_Ph' => $request->guardian_mobile,
        'pnt_off_Ph' => $request->guardian_office_phone,
        'pnt_home_Ph' => $request->guardian_home_phone,
        'pnt_Email' => $request->guardian_email,

        'mother_mobile' => $request->mother_mobile,
        'mother_office_phone' => $request->mother_office_phone,
        'mother_home_phone' => $request->mother_home_phone,
        'mother_email' => $request->mother_email,
        ];
        //dd($StudentContactarray);
        //DB::connection()->enableQueryLog();
        $student_contact = StudentContact::where('pnt_cnt_Id',$request->p_id)->update($Student_Contact_array);
        //$queries = DB::getQueryLog();
        //dd($queries);

        //dd($student_Contact_table);
        //$student_Contact_table->save();
        //$student_Contact_last_id = $request->p_id;
        //dd($student_Contact_last_id);


        /*student info Table*/
        $parentarray = [$request->guardian, $request->mother];
        $parent_ids = implode(",", $parentarray);

        if ($request->file('student_image')) {
            $student_image = $request->file('student_image');
            $new_student_image = "student" . time() . '.' . $student_image->getClientOriginalExtension();
            $student_image->move(public_path('upload/student'), $new_student_image);
            //echo "<pre>"; print_r($new_student_image); exit;
            //$studentinfoarray['std_Img'] = $new_student_image;
            $studentinfoarray = [
                'adm_No' => $request->adm_id,
                'std_Img' => $new_student_image,
                'lsch_Id' => $request->last_school_id,
                'emer_cnt_Id' => $request->e_id,
                'fk_pnt_cnt_Id' => $request->p_id,
                'parent_ids' => $parent_ids,
                'std_Fname' => $request->stdfname,
                'std_Mname' => $request->stdmname,
                'std_Lname' => $request->stdlname,
                'std_Status' => ($request->student_status == 'Active') ? 'Active' : 'Inactive',
                'cls_Id' => $request->class_name,

                //'std_Img' => $new_student_image,

                'gnd_Id' => $request->student_gender,
                'std_Dob' => $request->date_of_birth,
                'bg_Id' => $request->blood_group,
                'relig_Id' => $request->religion,
                'nation_Id' => $request->nationality,
                'dom_Id' => $request->student_district,
                'std_Age' => $request->age,
                'cast_Id' => $request->cast,
                'disable_Id' => $request->disability,
                'std_cat_Id' => $request->student_category,
            ];
        }else{
            $studentinfoarray = [
                'adm_No' => $request->adm_id,
                'lsch_Id' => $request->last_school_id,
                'emer_cnt_Id' => $request->e_id,
                'fk_pnt_cnt_Id' => $request->p_id,
                'parent_ids' => $parent_ids,
                'std_Fname' => $request->stdfname,
                'std_Mname' => $request->stdmname,
                'std_Lname' => $request->stdlname,
                'std_Status' => ($request->student_status == 'Active') ? 'Active' : 'Inactive',
                'cls_Id' => $request->class_name,

                //'std_Img' => $new_student_image,

                'gnd_Id' => $request->student_gender,
                'std_Dob' => $request->date_of_birth,
                'bg_Id' => $request->blood_group,
                'relig_Id' => $request->religion,
                'nation_Id' => $request->nationality,
                'dom_Id' => $request->student_district,
                'std_Age' => $request->age,
                'cast_Id' => $request->cast,
                'disable_Id' => $request->disability,
                'std_cat_Id' => $request->student_category,
            ];
        }


        //dd($studentinfoarray);

        StudentInfo::where('std_id', $request->std_id)->update($studentinfoarray);
        //dump($student_Contact_last_id);

        //return redirect('students')->with('message', 'Successfully Updated!');
        //$student_admission->fk_pnt_cnt_Id = $request->class;

        //$student_admission->save();

    }

    public function WithdrawlStudent($id){
        $student = DB::table('student_info')
            ->select('student_info.*', 'student_info.std_Id as s_id', 'admission.*')
            ->join('admission', 'student_info.adm_No', '=', 'admission.adm_No')
            //->select("tbl_templates.*", "tbl_templates.id as t_id", "tbl_template_categories.title as category_title")
            ->leftjoin('withdrawl_student', 'student_info.std_Id', '=', 'withdrawl_student.std_Id')
            ->where('student_info.std_Id',$id)->first();
        //dd($student);



        return view('withdraw-student', compact('student'));
    }
    public function WithdrawlStudentPost(Request $request){
        //dd($request->all());
        if ($request->optionCheckboxes == '')
        {
            $student_status_array = [
                'std_Status' => 'Inactive'
            ];
        }elseif($request->optionCheckboxes == 'Active'){
            $student_status_array = [
                'std_Status' => 'Active'
            ];
        }
        //dd($student_status_array);

        $student_status = StudentInfo::where('std_Id',$request->std_id)->update($student_status_array);
        //dd($request->all());
        $withdrawl = WithdrawlStudent::firstOrNew(array('std_Id' => $request->std_id));
        //dd($withdrawl);
        $withdrawl->std_Id = $request->std_id;
        $withdrawl->withdrawl_Date = $request->withdraw_date;
        $withdrawl->with_Remark = $request->commentslc;
        //$withdrawl->with_Date = $request->std_id;
        $withdrawl->save();



        return redirect('students')->with('message', 'Successfully Withdrwal Student!');
    }
    public function ChangeStudentStatus(Request $request){
        $student = StudentInfo::where('std_Id',$request->id)->first();
        //dd($request->id);
        if ($student->std_Status == 'Active')
        {
            $student_status_array = [
                'std_Status' => 'Inactive'
            ];
        }elseif($student->std_Status == 'Inactive'){
            $student_status_array = [
                'std_Status' => 'Active'
            ];
        }

        $student_status = StudentInfo::where('std_Id',$request->id)->update($student_status_array);

        return redirect()->back()->with('message', 'Successfully Change Status!');
    }


}
