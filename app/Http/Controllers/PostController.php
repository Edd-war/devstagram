<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {
        dd('Hola desde el controlador de Post');
        // return view('post.index');
    }
}
