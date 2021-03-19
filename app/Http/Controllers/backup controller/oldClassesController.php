<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\AddClasses;
use App\Models\Section;
use Illuminate\Http\Request;

/*use Redirect,Response;*/

/*use Illuminate\Support\Facades\Validator;*/

class AddClassesController extends Controller
{

    public function index()
    {
        $school_sections = Section::all();
        $subjects = Subject::all();
        $classes = AddClasses::all();
        return view('front.class.class-list', compact('classes', 'school_sections', 'subjects'));
    }

    public function create()
    {
        //echo "hello"; exit;

        $school_sections = Section::all();
        $subjects = Subject::all();
        $classes = AddClasses::all();
        return view('front.class.create', compact('school_sections', 'subjects', 'classes'));
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'class_name' => 'required|unique:class,class',
            'numeric_name' => 'required|numeric|min:1|max:20',
            'no_of_period' => 'required|numeric|min:1|max:10',
            'teacher' => 'required',
            'school_section' => 'required',
            'tuition_fee' => 'required',
            'subject' => 'required',

        ]);

        $subject = new AddClasses();
        $subject->class = $request->get('class_name');
        $subject->numeric_name = $request->get('numeric_name');
        $subject->no_of_period = $request->get('no_of_period');
        $subject->teacher = $request->get('teacher');
        $subject->sc_sec_Id = $request->get('school_section');
        $subject->tuition_fee = $request->get('tuition_fee');
        $subject->subject = implode(",", $request['subject']);
        $subject->save();

        //return response()->json(['message' => 'Successfully Added!']);
        return redirect('class')->with('message', 'Successfully Added!');


    }


    public function show($id)
    {

        $school_sections = Section::all();
        $subjects = Subject::all();
        $classes = AddClasses::all();
        $where = array('cls_Id' => $id);

        $class = AddClasses::where($where)->first();
        return view('front.class.show', compact('class', 'classes', 'subjects', 'school_sections'));

    }


    public function edit($id)
    {
        $school_sections = Section::all();
        $subjects = Subject::all();
        $classes = AddClasses::all();
        $where = array('cls_Id' => $id);
        $class = AddClasses::where($where)->first();
        return view('front.class.edit', compact('class', 'classes', 'subjects', 'school_sections'));
    }


    public function update(Request $request)
    {
        //return response()->json($request->all());
        //dd($request->all());
        $request->validate([
            'class_name' => 'required',
            'numeric_name' => 'required|numeric|min:1|max:20',
            'no_of_period' => 'required|numeric|min:1|max:10',
            'teacher' => 'required',
            'school_section' => 'required',
            'tuition_fee' => 'required',
            'subject' => 'required',

        ]);

        $form_data = array(
            'class' => $request->class_name,
            'numeric_name' => $request->numeric_name,
            'no_of_period' => $request->no_of_period,
            'teacher' => $request->teacher,
            'sc_sec_Id' => $request->school_section,
            'tuition_fee' => $request->tuition_fee,
            'subject' => implode(",", $request['subject']),
        );
        //dd($form_data);


        AddClasses::where('cls_Id', $request->id)->update($form_data);
        $request->flash();
        return redirect('class')->with('message', 'Successfully Updated!');
        //return response()->json(['message' => 'Successfully Updated!']);


    }


    public function delete($id)
    {
        AddClasses::where('cls_Id', $id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}
