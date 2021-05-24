<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Board;
use App\Models\District;
use App\Models\School;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{

    public function index()
    {
        $boards  = Board::all();
        $districts  = District::all();
        $cities  = City::all();
        //DB::connection()->enableQueryLog();
        $schools = DB::table('view_school');
        //dd($schools);
        $schools = DB::table('schools')
            ->join('domicile', 'schools.dom_Id', '=', 'domicile.dom_Id')
            ->join('cities', 'schools.city_Id', '=', 'cities.pk_city_id')
            ->leftjoin('boards', 'schools.board_Id', '=', 'boards.pk_board_id')
            ->get();
        //dd($schools);
        $query = DB::getQueryLog();
        //echo "<pre>"; print_r($query); exit;


        return view('add-school', compact('schools','boards','districts','cities'));
    }


  /*  public function CreateSchool(Request $request)
    {
        //dd($request->all());
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
            $subject = new School();
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


    }*/


    public function ShowSchool($id)
    {

        $where = array('pk_school_Id' => $id);
        $school = DB::table('schools')
            ->join('domicile', 'schools.dom_Id', '=', 'domicile.dom_Id')
            ->join('cities', 'schools.city_Id', '=', 'cities.pk_city_id')
            ->leftjoin('boards', 'schools.board_Id', '=', 'boards.pk_board_id')
            ->where($where)
            ->first();
        return Response::json($school);

    }


    public function EditSchool($id)
    {
        $where = array('pk_school_Id' => $id);
        $school = School::where($where)->first();
        return Response::json($school);
    }


    public function UpdateSchool(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'school_Name'  => 'required',
            'principal_Name'  => 'required',
            'affiliation_No'  => 'required',
            'registration'  => 'required',
            'registered_with'  => 'required',
            'district'  => 'required',
            'city'  => 'required',
            'primary_Contact'  => 'required',
            'school_address'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
                'school_Name'      => $request->school_Name,
                'principal_Name'       => $request->principal_Name,
                'affiliation_No' => $request->affiliation_No,
                'board_Id' => $request->board,
                'registration' => $request->registration,
                'registered_with' => $request->registered_with,

                'dom_Id' => $request->district,
                'city_Id' => $request->city,
                'primary_Contact' => $request->primary_Contact,
                'secondary_Contact' => $request->secondary_Contact,
                'school_Add' => $request->school_address,

            );
            //dd($form_data);


            School::where('pk_school_Id', $request->id)->update($form_data);
            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function DeleteSchool($id)
    {
        School::where('pk_school_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}
