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
        $employees = DB::table('employee_info')
            ->join('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
            ->join('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
            ->join('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
            ->join('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
            ->join('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
            ->join('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
            ->join('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
            ->join('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
            ->join('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
            ->join('professional_qualification', 'employee_info.prof_qual_Id', '=', 'professional_qualification.prof_qual_Id')
            ->join('academic_qualification', 'employee_info.acdm_qual_Id', '=', 'academic_qualification.acdm_qual_Id')
            ->join('prev_experience', 'employee_info.prev_exper_Id', '=', 'prev_experience.prev_exper_Id')
            ->get();
        //dd($employees);

        //$parents = $students[0]->parent_ids;

        //$parents = explode(',',$students[0]->parent_ids);
        //dd(array_values($parents)[0]);

        /*foreach($students->parent_ids as $p_id)
            {
                echo $p_id;
            }*/
        $genders = Gender::all();
        $bloodgroups = BloodGroup::all();
        $religions = Religion::all();
        $marital_status = MaritalStatus::all();
        $employee_types = EmployeeType::all();
        $employee_status = EmployeeInfo::all();
        $cities = City::all();
        $casts = Cast::all();

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
        $districts = District::all();
        $cities = City::all();
       $religions = Religion::all();
       $nationalities = Nationality::all();
       $casts = Cast::all();
        /*

              $student_categories = StudentCategory::all();
              $disabilities = Disability::all();

              $occupations = Occupation::all();

              $guardians = Guardian::where('gnd_Id', '=', 1)->get();
              $mothers = Guardian::where('gnd_Id', '!=', 1)->get();*/

        return view('appointment', compact('marital_status','genders','bloodgroups','employee_types','designations','ralationship','districts','cities', 'religions','nationalities','casts'));
    }

    public function appointmentInfo(Request $request)
    {
        //dd($request->all());

        if ($request->file('employee_image')) {
            $employee_image = $request->file('employee_image');
            $new_employee_image = "empl" . time() . '.' . $employee_image->getClientOriginalExtension();
            $employee_image->move(public_path('upload/employee'), $new_employee_image);
            //echo "<pre>"; print_r($new_student_image); exit;
        } else {
            $new_employee_image = "";
        }


        /*employee type Table*/
        $employee_contact_table = new EmployeeContact();
        $employee_contact_table->emp_mob_Ph = $request->employee_mobile_phone;
        $employee_contact_table->emp_home_Ph =$request->employee_home_phone;
        $employee_contact_table->emp_Email =$request->employee_email;
        $employee_contact_table->emp_mail_Add =$request->mailing_address;
        $employee_contact_table->emp_pmt_Add =$request->permanent_address;

        $employee_contact_table->emp_City =$request->employee_city;
        $employee_contact_table->emp_District =$request->district;
        $employee_contact_table->zip_Code =$request->zip_code;
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


        $Academic_qualification_table = new AcademicQualification();

        $Academic_qualification_table->acdm_qual_Name = implode(",",$request->qual_title);
        $Academic_qualification_table->subject = implode(",",$request->qual_subject);
        $Academic_qualification_table->university = implode(",",$request->qual_board);
        $Academic_qualification_table->acdm_comp_Session = implode(",",$request->qual_year);
        $Academic_qualification_table->grade = implode(",",$request->qual_grade);
        $Academic_qualification_table->acdm_Gpa = implode(",",$request->qual_gpa);
        $Academic_qualification_table->save();
        $Academic_qualification_table_last_id = $Academic_qualification_table->acdm_qual_Id;

        /* Professional Qualification Table */
        $professional_qualification_table = new ProfessionalQualification();
        $professional_qualification_table->prof_qual_Name = implode(",",$request->prof_qual_title);
        $professional_qualification_table->university = implode(",",$request->prof_qual_board);
        $professional_qualification_table->prof_comp_Session = implode(",",$request->prof_qual_year);
        $professional_qualification_table->save();
        $professional_qualification_table_last_id = $professional_qualification_table->prof_qual_Id;




        $Previous_experience_table = new PreviousExperience();

        $Previous_experience_table->prev_exper_Org = implode(",",$request->experience_organization);
        $Previous_experience_table->prev_exper_Position = implode(",",$request->experience_position);
        $Previous_experience_table->prev_exper_Role = implode(",",$request->experience_role);
        $Previous_experience_table->prev_Frmdate = implode(",",$request->experience_from_date);
        $Previous_experience_table->prev_Todate = implode(",",$request->experience_to_date);
        $Previous_experience_table->save();
        $Previous_experience_table_last_id = $Previous_experience_table->prev_exper_Id;

        /*Employment Info Table*/
        $employment_info_table = new EmploymentInfo();
        $employment_info_table->personal_No = rand(1000,1000000000);
        $employment_info_table->appt_Date =  $request->hire_date;
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
        $employee_info_table->gnd_Id =  $request->gender;
        $employee_info_table->emp_marital_Status =  $request->marital_status;
        $employee_info_table->bg_Id = $request->blood_group;
        $employee_info_table->emp_Cnic = $request->staff_cnic;
        $employee_info_table->emp_Dob =  $request->date_of_birth;
        $employee_info_table->relig_Id   = $request->religion;
        $employee_info_table->nation_Id  = $request->nationality;
        $employee_info_table->dom_Id  = $request->employee_district;
        $employee_info_table->cast_Id = $request->staff_cast;
        $employee_info_table->emp_Status = ($request->employee_status)? 'Active' : 'Inactive';
        /*last id's of another table start*/
        $employee_info_table->emp_typ_Id = $employee_type_last_id;
        $employee_info_table->emer_cnt_Id = $employee_emergency_table_last_id;
        $employee_info_table->empt_Id = $employment_info_table_last_id;
        $employee_info_table->acdm_qual_Id = $Academic_qualification_table_last_id;
        $employee_info_table->prof_qual_Id = $professional_qualification_table_last_id;
        $employee_info_table->prev_exper_Id = $Previous_experience_table_last_id;
        $employee_info_table->emp_cnt_Id = $employee_contact_table_last_id;
        /*last id's of another table end*/

        $employee_info_table->save();

        $user = new User();
        $user->name = $request->given_name;
        $user->user_type = $request->user_type;
        $user->username = $request->user_id;
        $user->status = ($request->status)? 'Active' : 'Inactive';
        $user->password = Hash::make($request->password);
        $user->save();

        $employee_last_id = $employee_info_table->emp_Id;
        /* Academic Qualification Table */

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
        return view('edit-admission-info', compact('student', 'studentParent', 'classes', 'genders', 'bloodgroups', 'religions', 'nationalities', 'districts', 'cities', 'casts', 'student_categories', 'disabilities', 'ralationship', 'designations', 'occupations', 'guardians', 'mothers'));
    }

    public function UpdateAdmissionInfo(Request $request)
    {
        //dd($request->input('p_id'));

        if ($request->file('student_image')) {
            $student_image = $request->file('student_image');
            $new_student_image = "student" . time() . '.' . $student_image->getClientOriginalExtension();
            $student_image->move(public_path('upload/student'), $new_student_image);
            //echo "<pre>"; print_r($new_student_image); exit;
            $studentinfoarray['std_Img'] = $new_student_image;
        }
        if ($request->file('previous_school_document')) {
            $school_image = $request->file('previous_school_document');
            $new_school_image = "document" . time() . '.' . $school_image->getClientOriginalExtension();
            $school_image->move(public_path('upload/school'), $new_school_image);
            //echo "<pre>"; print_r($new_school_image); exit;
            $last_schoolarray['lsch_slc_img'] = $new_school_image;
        }

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
        $last_schoolarray = [
            'lsch_Name' => $request->previous_school_name,
            'lsch_contact_No' => $request->previous_school_contact,
            'lsch_lv_Date' => $request->previous_school_leaving_date,
            'lsch_class_Passed' => $request->previous_school_class_passed,
            'lsch_Comments' => $request->previous_school_comment,

        ];
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

        //dd($studentinfoarray);

        StudentInfo::where('std_id', $request->std_id)->update($studentinfoarray);
        //dump($student_Contact_last_id);


        //$student_admission->fk_pnt_cnt_Id = $request->class;

        //$student_admission->save();

    }

}
