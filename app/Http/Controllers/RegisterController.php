<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);
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
            'password' => bcrypt($request->password),
        ]);
    }
}
