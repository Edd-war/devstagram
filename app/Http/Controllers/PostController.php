<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd('Hola desde el controlador de Post');
        // dd(auth()->user());
        return view('dashboard');
    }
}
