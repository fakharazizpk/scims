<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\Designation;
//use Illuminate\Support\Facades\Validator;

class AdminDesignationController extends Controller
{

    public function index()
    {
        $designations = Designation::all();

        return view('admin.designation.index', compact('designations'));
    }

    public function create()
    {
        return view('admin.designation.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'designation'  => 'required|unique:designation',
            'status'  => 'required',
        ]);

        $designation = new Designation;

        $designation->designation = $request->designation;
        $designation->desig_Status = $request->status;
        $designation->save();

        if($designation){
            return redirect('admin/designation')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $designation  = Designation::findOrFail($id);
        return view('admin.designation.edit', compact('designation'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'designation'  => 'required',
            'status'  => 'required',
        ]);

        $update = [

            'designation' => $request->designation,
            'desig_Status' => $request->status,


        ];

        Designation::where('desig_Id',$request->id)->update($update);

        return redirect('admin/designation')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $national = Designation::where('desig_Id',$id);
        $national->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}
