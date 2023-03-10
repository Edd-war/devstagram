<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);
        // dd($request->all());

        // Modificar el Request para que el campo username sea slug
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'name' => 'required|max:32|min:3',
            'username' => 'required|unique:users|max:12|min:3',
            'email' => 'required|unique:users|email|max:64|min:12',
            'password' => 'required|confirmed|max:32|min:8',
        ]);

        // dd('Creando usuario...');

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'password' => bcrypt($request->password),
        ]);

        // Autenticar al usuario registrado
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        // Otra forma de autenticar
        auth()->attempt($request->only('email', 'password'));

        // Redireccionar
        return redirect()->route('posts.index');
    }
}
