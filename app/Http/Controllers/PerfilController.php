<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        // dd('Guardando cambios');
        
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request,
        [
            'name' => 'required',
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:12', 'not_in:admin,administrador,editar-perfil'],
        ]);

        if($request->imagen)
        {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . '.' . $imagen->extension();
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);
            $imagenPath = public_path('perfiles').'/'.$nombreImagen;
            $imagenServidor->save($imagenPath);
            return response()->json(['imagen' => $nombreImagen]);
        }
        else
        {
            dd('No tiene imagen');
        }

        // GUARDAR CAMBIOS
        $usuario= User::find(auth()->user()->id);

        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? '';
        $usuario->save();

        // REDIRECIONAR
        // return redirect()->route('perfil.index')->with('mensaje', 'Perfil actualizado');
        return redirect()->route('posts.index', $usuario->username)->with('mensaje', 'Perfil actualizado');
    }
}
