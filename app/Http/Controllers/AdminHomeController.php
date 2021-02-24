<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Redirect,Response;
//use Illuminate\Support\Facades\Validator;

class AdminHomeController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }


}
