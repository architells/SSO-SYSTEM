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
}
