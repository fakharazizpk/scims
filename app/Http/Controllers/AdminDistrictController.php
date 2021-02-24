<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\District;
//use Illuminate\Support\Facades\Validator;

class AdminDistrictController extends Controller
{

    public function index()
    {
        $districts = District::all();

        return view('admin.district.index', compact('districts'));
    }

    public function create()
    {
        return view('admin.district.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'district'  => 'required|unique:App\Models\District,dom_District',
        ]);

        $district = new District();

        $district->dom_District = $request->district;
        $district->save();

        if($district){
            return redirect('admin/district')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $district = District::findOrFail($id);
        return view('admin.district.edit', compact('district'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'district'  => 'required',
        ]);

        $update = [
            'dom_District' => $request->district,
        ];

        District::where('dom_Id',$request->id)->update($update);

        return redirect('admin/district')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $religion = District::where('dom_Id',$id);
        $religion->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}
