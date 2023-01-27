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
        $this->validate($request, [
            'name' => 'required|max:32|min:3',
            'username' => 'required|unique:users|max:12|min:3',
            'email' => 'required|unique:users|email|max:64|min:12',
            'password' => 'required|confirmed|max:32|min:8',
        ]);

        // dd('Creando usuario...');

        User::create([
            'name' => $request->name,
            'username' => Str::slug($request->username),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'password' => bcrypt($request->password),
        ]);
    }
}
