<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __invoke()
    {
        // OBTENER A QUINES SEGUIMOS
        $ids = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->with('user')->latest()->paginate(5);

        // dd($posts);

        // dd('HOME');
        // return view('home');   
        return view('home', [
            'posts' => $posts
        ]);
    }
}
