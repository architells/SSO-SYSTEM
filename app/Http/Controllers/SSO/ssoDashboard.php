<?php

namespace App\Http\Controllers\SSO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ssoDashboard extends Controller
{
   public function dashboard(){
        return view('SSO.dashboard');
   }

   public function showAdd(){
      return view('SSO.add-user');
   }
}
