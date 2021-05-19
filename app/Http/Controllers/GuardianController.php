<?php

namespace App\Http\Controllers;
use App\Models\Guardian;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class GuardianController extends Controller
{
    public function index(){
        return view('parent-dashboard');
    }

    public function getGuardianFatherPicture($id){

        $guadianimageData = Guardian::select('guardian_image')->where('pnt_Id', $id)->first();
        //dd($guadianimageData);
        return $guadianimageData;

    }
    public function getGuardianMotherPicture($id){

        $guadianMotherimageData = Guardian::select('guardian_image')->where('pnt_Id', $id)->first();
        //dd($guadianimageData);
        return $guadianMotherimageData;

    }
    public function getGuardianFather(){

        $guadianfatherData = Guardian::orderBy('pnt_Id', 'desc')->where('gnd_Id', '=', 1)->first();
        //dd($guadianfatherData);
        return $guadianfatherData;

    }
    public function getGuardianMother(){

        $guadianMotherData = Guardian::orderBy('pnt_Id', 'desc')->where('gnd_Id', '!=', 1)->first();
        //dd($guadianMotherData);
        return $guadianMotherData;

    }

   public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'guardian_first_name' => 'required',
            'guardian_last_name' => 'required',
            'guardian_gender' => 'required',
            'guardian_cnic' => 'required|unique:parent_info,pnt_Cnic',
            'guardian_relation' => 'required',
            'guardian_occupation' => 'required',
            'guardian_designation' => 'required',
            'guardian_employer' => 'required',
            'guardian_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }else{

            $image = $request->file('guardian_image');
            $new_name = "guardian"  . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/guardian'), $new_name);

            $subject = new Guardian();
            $subject->pnt_Fname = $request->get('guardian_first_name');
            $subject->pnt_Mname = $request->get('guardian_middle_name');
            $subject->pnt_Lname = $request->get('guardian_last_name');
            $subject->pnt_Cnic  = $request->get('guardian_cnic');
            $subject->gnd_Id  = $request->get('guardian_gender');

            $subject->occup_Id = $request->get('guardian_occupation');
            $subject->desig_Id  = $request->get('guardian_designation');
            $subject->fk_relat_Id = $request->get('guardian_relation');
            $subject->prnt_employer_name  = $request->get('guardian_employer');
            $subject->guardian_image  = $new_name;
            $subject->save();

            return response()->json(['message' => 'Successfully Added!']);
            //return redirect('add-subject')->with('message', 'Successfully Added!');
        }

    }

    public function motherInfo(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'mother_first_name' => 'required',
            'mother_last_name' => 'required',
            'mother_cnic' => 'required|unique:parent_info,pnt_Cnic',
            'mother_marital_status' => 'required',
            'mother_working_status' => 'required',
            'mother_relation' => 'required',
            //'mother_gender' => 'required',
            //'mother_occupation' => 'required',
            //'mother_designation' => 'required',
            //'mother_employer' => 'required',
            'mother_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }else{

            $image = $request->file('mother_image');
            $new_name = "mother"  . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/guardian'), $new_name);

            $subject = new Guardian();
            $subject->pnt_Fname = $request->get('mother_first_name');
            $subject->pnt_Mname = $request->get('mother_middle_name');
            $subject->pnt_Lname = $request->get('mother_last_name');
            $subject->pnt_Cnic  = $request->get('mother_cnic');
            $subject->gnd_Id  = $request->get('mother_gender');

            $subject->occup_Id = $request->get('mother_occupation');
            $subject->desig_Id  = $request->get('mother_designation');
            $subject->fk_relat_Id = $request->get('mother_relation');
            $subject->prnt_employer_name  = $request->get('mother_employer');
            $subject->guardian_image  = $new_name;
            $subject->save();

            return response()->json(['message' => 'Successfully Added!']);
            //return redirect('add-subject')->with('message', 'Successfully Added!');
        }

    }

}
