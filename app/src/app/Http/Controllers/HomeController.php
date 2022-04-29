<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function quiz()
    {
        return view('quiz');
    }

    public function results()
    {
        return view('results');
    }
}
