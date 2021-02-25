<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\University;
//use Illuminate\Support\Facades\Validator;

class AdminUniversityController extends Controller
{

    public function index()
    {
        $universities = University::all();

        return view('admin.university.index', compact('universities'));
    }

    public function create()
    {
        return view('admin.university.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'university'  => 'required|unique:university_list,univ_Name',
        ]);

        $university = new University();

        $university->univ_Name = $request->university;
        $university->save();

        if($university){
            return redirect('admin/university')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $university  = University::findOrFail($id);
        return view('admin.university.edit', compact('university'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'university'  => 'required',
        ]);

        $update = [
            'univ_Name' => $request->university,
        ];

        University::where('univ_Id',$request->id)->update($update);

        return redirect('admin/university')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $university = University::where('univ_Id',$id);
        $university->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}
