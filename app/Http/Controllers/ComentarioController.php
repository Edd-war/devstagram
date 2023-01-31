<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //
    public function store(Request $request, User $user, Post $post)
    {
        // dd('Creando comentario...');
        // VALIDAR DATOS
        $this->validate(request(), [
            'comentario' => 'required|max:255'
        ]);

        // GUARDAR DATOS
        Comentario::create([
            'comentario' => $request->comentario,
            'user_id' => auth()->user()->id,
            'post_id' => $post->id
        ]);

        // REDIRECCIONAR
        return back()->with('mensaje', 'Comentario agregado');
    }
}
