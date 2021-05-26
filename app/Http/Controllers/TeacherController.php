<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
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
        return view('teacher.dashboard');
    }
    public function Dairy()
    {
        return view('teacher.dairy');
    }

    public function TeacherProfile()
    {
        return view('teacher.profile');
    }

    public function Edit($id)
    {
        $where = array('id' => $id);
        $user = User::where($where)->first();
        return Response::json($user);
    }

    public function UpdateUser(Request $request)
    {
        //dd($request->all());
        if ($request->password != '') {
            $form_data = array(
                'name' => $request->given_name,
                'username' => $request->username,
                'user_type' => $request->user_type,
                'password' => Hash::make($request->password),
                'status' => ($request->get('status')) ? 'Active' : 'Inactive',
            );
        } else {
            $form_data = array(
                'name' => $request->given_name,
                'username' => $request->username,
                'user_type' => $request->user_type,
                'status' => ($request->get('status')) ? 'Active' : 'Inactive',
            );
        }
    }
}
