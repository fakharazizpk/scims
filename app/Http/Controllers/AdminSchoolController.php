<?php

namespace App\Http\Controllers;
use App\Models\Board;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\District;
use App\Models\School;
Use DB;
//use Illuminate\Support\Facades\Validator;

class AdminSchoolController extends Controller
{

    public function index()
    {
        $schools = DB::table('schools')
            ->join('domicile', 'schools.dom_Id', '=', 'domicile.dom_Id')
            ->join('cities', 'schools.city_Id', '=', 'cities.pk_city_id')
            ->leftjoin('boards', 'schools.board_Id', '=', 'boards.pk_board_id')
            ->get();

        return view('admin.school.index', compact('schools'));
    }

    public function create()
    {
        $boards  = Board::all();
        $districts  = District::all();
        $cities  = City::all();
        return view('admin.school.create', compact('districts', 'cities','boards'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'school_Name'  => 'required|unique:schools',
            'principal_Name'  => 'required',
            'affiliation_No'  => 'required',
            'registration'  => 'required',
            'registered_with'  => 'required',
            'district'  => 'required',
            'city'  => 'required',
            'primary_Contact'  => 'required|numeric|min:10|max:11',
            'school_address'  => 'required',
        ]);

        $school = new School();

        $school->school_Name = $request->school_Name;
        $school->principal_Name = $request->principal_Name;
        $school->affiliation_No = $request->affiliation_No;
        $school->board_Id  = $request->board;
        $school->registration = $request->registration;
        $school->registered_with = $request->registered_with;

        $school->dom_Id = $request->district;
        $school->city_Id = $request->city;
        $school->primary_Contact = $request->primary_Contact;
        $school->secondary_Contact = $request->secondary_Contact;
        $school->school_Add = $request->school_address;
        $school->save();

        if($school){
            return redirect('admin/school')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $school  = School::findOrFail($id);
        $boards  = Board::all();
        $districts  = District::all();
        $cities  = City::all();
        return view('admin.school.edit', compact('cities', 'districts','school','boards'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'school_Name'  => 'required',
            'principal_Name'  => 'required',
            'affiliation_No'  => 'required',
            'registration'  => 'required',
            'registered_with'  => 'required',
            'district'  => 'required',
            'city'  => 'required',
            'primary_Contact'  => 'required|numeric|min:10|max:11',
            'school_address'  => 'required',
        ]);
        $update = [

            'school_Name' => $request->school_Name,
            'principal_Name' => $request->principal_Name,
            'affiliation_No' => $request->affiliation_No,
            'board_Id' => $request->board,
            'registration' => $request->registration,
            'registered_with' => $request->registered_with,
            'dom_Id' => $request->district,
            'city_Id' => $request->city,
            'primary_Contact' => $request->primary_Contact,
            'secondary_Contact' => $request->secondary_Contact,
            'school_Add' => $request->school_address,
        ];

        School::where('pk_school_id',$request->id)->update($update);

        return redirect('admin/school')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $national = School::where('pk_school_id',$id);
        $national->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}
