@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')

    <X-listar-post />

    {{-- @forelse ($posts as $post)
        <h1>{{ $post->titulo }}</h1>
    @empty
        <p>No hay posts</p>
    @endforelse --}}

@endsection