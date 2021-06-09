<?php

namespace App\Http\Controllers;
use App\Models\Section;
use App\Models\Exam;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Redirect,Response;

class ExaminerController extends Controller
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
        $school_sections = Section::all();
        $exams = DB::table('exams')->get();
        //$school_sections_selected = DB::table('school_section')
            //->whereIn('sc_sec_Id', explode(",",$exams[0]->school_section))
            //->get();
        //dd($school_sections_selected);
        return view('examiner.dashboard', compact('school_sections', 'exams'));
    }

    public function CreateExam(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'exam_Type' => 'required',
            'school_Section' => 'required',
            'exam_Name' => 'required',
            'exam_Start' => 'required',
            'exam_End' => 'required',
            'exam_Comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            //$schoolsection = implode(",", implode($request->school_Section));
            //dd($schoolsection);
            $exam = new Exam();
            $exam->exm_typ_Id = $request->get('exam_Type');
            $exam->school_section = implode(",",$request['school_Section']);
            $exam->exam_Name = $request->get('exam_Name');
            $exam->exam_Start = $request->get('exam_Start');
            $exam->exam_End = $request->get('exam_End');
            $exam->exam_Comment = $request->get('exam_Comment');
            $exam->exam_Status = "Active";
            $exam->save();
            return response()->json(['message' => 'Successfully Added!']);
            //return redirect('add-subject')->with('message', 'Successfully Added!');
        }


        // return redirect('add-subject')->with('message', 'Successfully Added!');;
        ///
        //return redirect()->back()->with('message', 'Successfully Added!');


    }

    public function EditExam($id)
    {

        $where = array('exam_Id' => $id);
        $exam = Exam::where($where)->first();

        //$exam->selectedSubjectIds = explode(',',$exam->school_section);

        return Response::json($exam);

    }


    public function ExaminerProfile()
    {
        //dd(session()->all()
    }

    public function editProfile(){

    }

    public function ProfileUpdate(Request $request)
    {


    }
}
