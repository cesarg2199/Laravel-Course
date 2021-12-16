<?php

namespace App\Http\Controllers\Website;

//when controllers are in a sub folder include this statement to be able to extend the controller since class is not in the same namespace.
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('Test.welcome');
    }
}
