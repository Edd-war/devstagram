<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        // return 'Imagen subida';
        $imagen = $request->file('file');

        // return response()->json($input, 200);
        return response()->json(['imagen' => "Probando respuesta"]);
    }
}
