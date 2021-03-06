<?php

namespace App\Http\Controllers;

use App\Models\ClassSection;
use App\Models\AddClasses;
use App\Models\EmployeeInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;
use Illuminate\Support\Facades\Validator;


class ClassSectionController extends Controller
{

    public function index()
    {
        //echo "class-section index function"; exit;


        $class_sections = DB::table('class_section')
            ->join('class', 'class_section.cls_Id', '=', 'class.cls_Id')
            ->join('employee_info', 'class_section.emp_Id', '=', 'employee_info.emp_Id')
            ->get();

        //echo "<pre>"; print_r($class_sections); exit;
        $nameofclasses = AddClasses::all();
        /*$students = DB::table('student_info')
            ->whereIn('std_Id',explode(',',$class_sections->students))->get();*/
        //dd($students);
        $teachers = EmployeeInfo::where('emp_typ_Id', '=', '1')->get();

        return view('class-section', compact('nameofclasses', 'class_sections', 'teachers'));
    }


    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_name' => 'required',
            'class_section_name' => 'required',
            'students' => 'required',
            'no_of_student' => 'required',
            'teacher' => 'required',
            'representative' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $class_section = new ClassSection();
            $class_section->cls_Id = $request->get('class_name');
            $class_section->class_section_name = $request->get('class_section_name');
            $class_section->students = implode(",", $request['students']);
            $class_section->no_of_student = $request->get('no_of_student');
            $class_section->emp_Id = $request->get('teacher');
            $class_section->crep_Id = $request->get('representative');

            $class_section->save();
            return response()->json(['message' => 'Successfully Added!']);

        }
    }


    public function show($id)
    {

        $where = array('c_section_Id' => $id);

        $class_section = DB::table('class_section')
            ->select('class_section.class_section_name','class_section.no_of_student','class.class', 'employee_info.emp_given_name','student_info.std_Fname','student_info.std_Mname','student_info.std_Lname')
            ->leftjoin('class', 'class_section.cls_Id', '=', 'class.cls_Id')
            ->leftjoin('employee_info', 'class_section.emp_Id', '=', 'employee_info.emp_Id')
            ->leftjoin('student_info', 'class_section.crep_Id', '=', 'student_info.std_Id')
            ->where($where)->first();
        //dd($class_section);
        return Response::json($class_section);

    }


    public function edit($id)
    {
        $where = array('c_section_Id' => $id);
        $class_sections = ClassSection::where($where)->first();
            //DB::table('class_section')
                          //->join('student_info', 'class_section.std_Id,  student_info.std_Id')->first();
            //
        //->studentbyIds = explode(',',$class->subject);

        $class_sections->studentbyids = explode(',', $class_sections->students);
        $class_sections->user =  $class_sections->user;


        return Response::json($class_sections);
    }


    public function update(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'class_name' => 'required',
            'class_section_name' => 'required',
            'students' => 'required',
            'no_of_student' => 'required',
            'teacher' => 'required',
            'representative' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $form_data = array(
                'cls_Id' => $request->class_name,
                'class_section_name' => $request->class_section_name,
                'students' => $request->students,
                'no_of_student' => $request->no_of_student,
                'emp_Id' => $request->teacher,
                'crep_Id' => $request->representative,
            );
            //dd($form_data);


            ClassSection::where('c_section_Id', $request->id)->update($form_data);
            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function delete($id)
    {
        ClassSection::where('c_section_Id', $id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}
