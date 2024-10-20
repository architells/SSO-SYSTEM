<?php

namespace App\Http\Controllers\SSC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function ShowSscLogin(){
        return view('SSC.auth.ssc-login-page');
    }

    public function ShowSscRegister(){
        return view('SSC.auth.ssc-register-page');
    }

}
