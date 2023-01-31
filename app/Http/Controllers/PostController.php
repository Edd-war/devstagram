<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        // dd('Hola desde el controlador de Post');
        // dd(auth()->user());
        // dd($user->username);

        // $posts = Post::where('user_id', $user->id)->latest()->paginate(5);
        $posts = Post::where('user_id', $user->id)->paginate(5);

        // dd($posts);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        // dd('Creando post...');
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // dd('Creando publicación...');
        $this->validate(request(), [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        // Post::create([
        //     'titulo' => request('titulo'),
        //     'contenido' => request('descripcion'),
        //     'imagen' => request('imagen'),
        //     'user_id' => auth()->user()->id
        // ]);

        // OTRA FORMA DE CREAR REGISTROS
        // $post = new Post;
        // $post->titulo = $request->titulo;
        // $post->contenido = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        // OTRA FORMA DE CREAR REGISTROS CON RELACIONES
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'contenido' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts.index', ['user' => auth()->user()->username]);
    }

    public function show(Post $post)
    {
        // dd('Mostrando publicación...');
        return view('posts.show',
            [
                'post' => $post
            ]
        );
    }
}
