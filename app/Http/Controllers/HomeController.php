<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __invoke()
    {
        // OBTENER A QUINES SEGUIMOS
        dd(auth()->user()->followings->pluck('id')->toArray());

        // dd('HOME');
        return view('home');   
    }
}
