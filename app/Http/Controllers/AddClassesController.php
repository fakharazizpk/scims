<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\AddClasses;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class AddClassesController extends Controller
{

    public function index()
    {

        $school_sections = Section::all();
        $subjects = Subject::all();
        $classes = AddClasses::all();
        return view('add-classes', compact('classes', 'school_sections','subjects'));
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'class_name' => 'required',
            'numeric_name' => 'required',
            'no_of_period' => 'required',
            'school_section' => 'required',
            'tuition_fee' => 'required',
            'subject' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }else{

            $subject = new AddClasses();
            $subject->class = $request->get('class_name');
            $subject->numeric_name = $request->get('numeric_name');
            $subject->no_of_period = $request->get('no_of_period');
            $subject->sc_sec_Id = $request->get('school_section');
            $subject->tuition_fee = $request->get('tuition_fee');
            $subject->subject = implode(",",$request['subject']);
            $subject->save();

            return response()->json(['message' => 'Successfully Added!']);
            //return redirect('add-subject')->with('message', 'Successfully Added!');
        }

    }


    public function show($id)
    {

        $where = array('cls_Id' => $id);
        //$class = AddClasses::where($where)->first();
        $class = DB::table('class')
                        ->join('school_section','class.sc_sec_Id','=','school_section.sc_sec_Id')
                        ->where($where)->first();
        //dd($class->subject);
        $subjects = DB::table('subject')
            ->whereIn('sub_Id',explode(',',$class->subject))->get();

        $class->subjects = $subjects;

        return Response::json($class);

    }


    public function edit($id)
    {
        $where = array('cls_Id' => $id);
        $class = AddClasses::where($where)->first();

        $class->selectedSubjectIds = explode(',',$class->subject);

        return Response::json($class);
    }


    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'class_name' => 'required',
            'numeric_name' => 'required',
            'no_of_period' => 'required',
            'school_section' => 'required',
            'tuition_fee' => 'required',
            'subject' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }else{

            $form_data = array(
                'class'      => $request->class_name,
                'numeric_name'       => $request->numeric_name,
                'no_of_period' => $request->no_of_period,
                'sc_sec_Id' => $request->school_section,
                'tuition_fee' => $request->tuition_fee,
                'subject' => implode(",",$request['subject']),
            );
            //dd($form_data);


            AddClasses::where('cls_Id', $request->id)->update($form_data);
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function delete($id)
    {
        AddClasses::where('sub_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}
