<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function ShowSsoLogin(){
        return view('SSO.auth.sso-login-page');
    }

    public function ShowSsoRegister(){
        return view('SSO.auth.sso-register-page');
    }
    public function ShowSscLogin(){
        return view('SSC.auth.ssc-login-page');
    }

    public function ShowSscRegister(){
        return view('SSC.auth.ssc-register-page');
    }
    
}
