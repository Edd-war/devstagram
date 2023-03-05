<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        // return 'Imagen subida';
        // dd($request->all());
        $imagen = $request->file('file');

        // $nombreImagen = Str::uuid() . '.' . $imagen->getClientOriginalExtension();
        $nombreImagen = Str::uuid() . '.' . $imagen->extension();

        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000);

        // $imagenPath = public_path('uploads/' . $nombreImagen);
        $imagenPath = public_path('uploads').'/'.$nombreImagen;
        $imagenServidor->save($imagenPath);
        // $imagenServidor->resize(800, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // });
        // return $nombreImagen;
        // return response()->json($input, 200);
        return response()->json(['imagen' => $nombreImagen]);
    }
}
