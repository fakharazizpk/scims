<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\EmployeeType;
Use DB;
//use Illuminate\Support\Facades\Validator;

class AdminEmployeeTypeController extends Controller
{

    public function index()
    {
        $employee_types  = DB::table('employee_type')
            ->join('designation', 'employee_type.desig_Id', '=', 'designation.desig_Id')
            ->get();

        return view('admin.employee-type.index', compact('employee_types'));
    }

    public function create()
    {
        $designations  = Designation::all();
        return view('admin.employee-type.create', compact('designations'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'designation'  => 'required',
            'employee_type'  => 'required',
        ]);

        $emp_type = new EmployeeType();


        $emp_type->emp_Type = $request->employee_type;
        $emp_type->desig_Id = $request->designation;
        $emp_type->save();

        if($emp_type){
            return redirect('admin/employee-type')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {

        $employee_type  = EmployeeType::findOrFail($id);
        $designations  = Designation::all();
        return view('admin.employee-type.edit', compact('designations', 'employee_type'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'designation'  => 'required',
            'employee_type'  => 'required',
        ]);
        $update = [

            'emp_Type' => $request->employee_type,
            'desig_Id' => $request->designation,
        ];

        EmployeeType::where('emp_typ_Id',$request->id)->update($update);

        return redirect('admin/employee-type')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $national = EmployeeType::where('emp_typ_Id',$id);
        $national->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}
