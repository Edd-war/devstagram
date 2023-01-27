<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {
        // dd('Hola desde el controlador de Post');
        dd(auth()->user());
        // return view('post.index');
    }
}
