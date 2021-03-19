<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
/*use Redirect,Response;*/
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{

    public function index()
    {
        //echo "afdasdfsdgsg"; exit;
        $subjects = Subject::all();
        return view('front.subject.list', compact('subjects'));
    }

    public function create()
    {

        return view('front.subject.create');

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:subject,subject',
            'code' => 'required',
            'theory_marks' => 'required',
            'practical_marks' => 'required',
            'total_marks' => 'required',
            'passing_marks' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }else{
            $subject = new Subject();
            $subject->subject = $request->get('name');
            $subject->sub_Code = $request->get('code');
            $subject->sub_th_Mks = $request->get('theory_marks');
            $subject->sub_prac_Mks = $request->get('practical_marks');
            $subject->sub_tot_Mks = $request->get('total_marks');
            $subject->sub_pass_Mks = $request->get('passing_marks');
            $subject->save();
            return response()->json(['message' => 'Successfully Added!']);
            //return redirect('add-subject')->with('message', 'Successfully Added!');
        }


        // return redirect('add-subject')->with('message', 'Successfully Added!');;
        ///
        //return redirect()->back()->with('message', 'Successfully Added!');


    }


    public function show($id)
    {

        $where = array('sub_Id' => $id);
        $subject = Subject::where($where)->first();
        return view('front.subject.show',$subject);

    }


    public function edit($id)
    {
        $where = array('sub_Id' => $id);
        $subject = Subject::where($where)->first();
        return view('front.subject.edit',$subject);
    }


    public function update(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required',
            'theory_marks' => 'required',
            'practical_marks' => 'required',
            'total_marks' => 'required',
            'passing_marks' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }else{

            $form_data = array(
                'subject'      => $request->name,
                'sub_Code'       => $request->code,
                'sub_th_Mks' => $request->theory_marks,
                'sub_prac_Mks' => $request->practical_marks,
                'sub_tot_Mks' => $request->total_marks,
                'sub_pass_Mks' => $request->passing_marks,
            );
            //dd($form_data);


            Subject::where('sub_Id', $request->id)->update($form_data);
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function delete($id)
    {
        Subject::where('sub_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}
