<?php

namespace App\Http\Controllers;
use App\Models\UserType;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;
use Redirect,Response;
//use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('add-users', compact('users'));
    }

    public function ProfileView()
    {        //dd(Session::get('userData'));
        $adminprofile = User::where('id',Session::get('userData')['id'])->first();
        //dd($adminprofile);
        return view('profile', compact('adminprofile'));
    }
    public function ProfileEdit()
    {
        //dd(Session::get('userData'));
        $users_types = UserType::all();
        //dd($users_types);
        $adminprofile = User::where('id',Session::get('userData')['id'])->first();
        //dd($adminprofile);
        return view('profile-edit', compact('adminprofile','users_types'));
    }
    public function ProfileUpdate(Request $request)
    {
        //dd($request->file('user_image'));
        $request->validate([
            'name'    => 'required',
            'email'    => 'required',
            'phone'    => 'required',
            'password_confirmation' => 'same:password',
            'user_image' => 'image|mimes:jpeg,png,jpg,png|max:1024',
        ]);
        $form_data = array();

            $form_data = array(
                'name'      => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            );
        if ($request->password !=''){
            $form_data['password'] = Hash::make($request->get('password'));
            //dd($form_data['password']);
        }
        if ($request->hasFile('user_image')) {
            $user_image = $request->file('user_image');
            $new_user_image = "user" . time() . '.' . $user_image->getClientOriginalExtension();
            $user_image->move(public_path('upload/user'), $new_user_image);
            $form_data['user_image'] = $new_user_image;
        }
        //dd($form_data);
        User::where('id', Session::get('userData')['id'])->update($form_data);
        $request->flash();
        return redirect()->back()->with('message', 'Successfully Updated!');

    }


    public function LoginPage(){
        return view('login');
    }

    public function Login(Request $request){
        //dd('your Request');

        $request->validate([
            'username'    => 'required',
            'password' => 'required'
        ]);

        $username = $request->get('username');
        $password = $request->get('password');
        $user     = User::where([
            ['username', '=', $username],
            ['status', '=', 'Active'],
        ])->first();
        //dd($user);
        if ($user){
            if (Hash::check($password, $user->password)){
                $userFound = User::where([
                    ['username', '=', $username],
                    //            ['password', '=', $password],
                    ['status', '=', 'Active'],
                ])->first();

                if ($userFound){
                    $userData = array(
                        'id'         => $userFound["id"],
                        'name'      => $userFound["name"],
                        'username' => $userFound["username"],
                        'email'  => $userFound["email"],
                        'phone'  => $userFound["phone"],
                        'user_type'  => $userFound["user_type"],
                        'status'  => $userFound["status"],
                    );
                    Session::put('userData', $userData);
                    //dd($userFound->user_type);
                    if($userFound->user_type=='Admin'){
                        return redirect('home');// exit;
                    }
                    else if($userFound->user_type=='Teacher'){
                        return redirect('teacher/dashboard');
                    }
                    else if($userFound->user_type=='Accountant'){
                        return "Accountant Dashboard";// exit;
                    }else{
                        return back()->with('error', 'Account is not active');
                    }

                }
            } else {
                $request->flashExcept('password');

                return back()->with('error', 'Wrong Login Details');
            }
        } else {
            $request->flashExcept('password');

            return back()->with('error', 'User is not found or Account is not active');
        }
    }


    public function CreateUser(Request $request)
    {

        //dd($request->all());
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
        }*/
        $user = new User();
        $user->name = $request->get('given_name');
        $user->user_type = $request->get('user_type');
        $user->username = $request->get('username');
        $user->status = ($request->get('status'))? 'Active' : 'Inactive';
        $user->password = Hash::make($request->get('password'));
        $user->save();

        //return redirect('add-subject');
        //return response()->json(['success' => 'Data is successfully added']);
        return redirect()->back()->with('message', 'Successfully Added!');


    }


    public function ShowUser($id)
    {

        $where = array('id' => $id);
        $user = User::where($where)->first();
        return Response::json($user);

    }


    public function EditUser($id)
    {
        $where = array('id' => $id);
        $user = User::where($where)->first();
        return Response::json($user);
    }


    public function UpdateUser(Request $request)
    {
        //dd($request->all());
        if ($request->password !=''){
            $form_data = array(
                'name'      => $request->given_name,
                'username'       => $request->username,
                'user_type' => $request->user_type,
                'password' => Hash::make($request->password),
                'status' => ($request->get('status'))? 'Active' : 'Inactive',
            );
        }else{
            $form_data = array(
                'name'      => $request->given_name,
                'username'  => $request->username,
                'user_type' => $request->user_type,
                'status' => ($request->get('status'))? 'Active' : 'Inactive',
            );
        }


        //dd($form_data);


    User::where('id', $request->id)->update($form_data);
    $request->flash();
    return redirect()->back()->with('message', 'Successfully Updated!');

    }


    public function Logout()
    {
        session()->flush();

        // TODO: make sure that userData variable in session has been deleted
        return Redirect('login');
    }
    public function DeleteUser($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}
