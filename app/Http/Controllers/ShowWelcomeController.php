<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowWelcomeController extends Controller
{
    public function showDefaultWelcome()
    {
       return view('welcome');
    }

    
}
