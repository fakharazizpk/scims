<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
