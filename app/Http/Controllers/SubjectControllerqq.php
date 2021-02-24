<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Subject::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.add-subject');

        /* $subjects = Subject::all();
         return view('admin.add-subject', compact('subjects'));*/
    }


    public function store(Request $request)
    {

        Subject::updateOrCreate(
            ['id' => $request->subject_id],
            [
                'subject' => $request->name,
                'sub_Code' => $request->code,
                'sub_th_Mks' => $request->theory_marks,
                'sub_prac_Mks' => $request->practical_marks,
                'sub_tot_Mks' => $request->total_marks,
                'sub_pass_Mks' => $request->passing_marks,
            ]);

        return response()->json(['success' => 'Subject saved successfully.']);
        /*   $validator = Validator::make($request->all(), [
               'name' => 'required',
               'code' => 'required',
               'theory_marks' => 'required',
               'practical_marks' => 'required',
               'total_marks' => 'required',
               'passing_marks' => 'required',
           ]);

           if ($validator->fails()) {
               return response()->json(['errors' => $validator->errors()->all()]);

        $subject = new Subject();
        $subject->subject = $request->get('name');
        $subject->sub_Code = $request->get('code');
        $subject->sub_th_Mks = $request->get('theory_marks');
        $subject->sub_prac_Mks = $request->get('practical_marks');
        $subject->sub_tot_Mks = $request->get('total_marks');
        $subject->sub_pass_Mks = $request->get('passing_marks');
        $subject->save();

        return redirect('add-subject');
        //return response()->json(['success' => 'Data is successfully added']);

        }*/
    }


    public function ShowSubject($id)
    {
        dd($id);
    }


    public function EditSubject($id)
    {
        //$subject = Subject::find($id);
        //return response()->json($subject);
    }


    public function UpdateSubject(Request $request)
    {
        //
    }


    public function DeleteSubject($id)
    {

        Subject::where('sub_Id', $id)->delete();
        return redirect('add-subject')->with('message', 'Successfully Deleted!');
    }
}
