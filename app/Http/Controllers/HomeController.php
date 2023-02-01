<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __invoke()
    {
        // dd('HOME');
        return view('home');   
    }
}
