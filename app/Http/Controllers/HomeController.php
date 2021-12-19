<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home() 
    {
        //dd(Auth::check());
        //dd(Auth::id());
        //use pointer to access table cols
        //dd(Auth::user()->name);
        return view('Home.index');
    }

    public function contact()
    {
        return view('Home.contact');
    }

    public function secret()
    {
        return view('Home.secret');
    }
}
