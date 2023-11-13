@extends('layouts.app')
@php

  $trabajoId=request()->route('id');
  $trabajo= App\Models\Trabajo::find($trabajoId);
  
@endphp
@section('title', 'Home')

@section('content')
@if(auth()->user()->role == 'null' || auth()->user()->role == null)

<div class="container">
  <form action="{{ route('trabajo.update', $trabajo->id) }}"method="POST">
        @csrf

        <label for="nombre_trabajo" class="form-label">Nombre:</label>
        <input type="text" id="nombre_trabajo" name="nombre_trabajo" class="form-control"  value="{{ $trabajo->nombre_trabajo }}">
        <br>


        <label for="fecha_trabajo" class="form-label">Fecha:</label>
        <input type="text" id="fecha_trabajo" class="form-control" name="fecha_trabajo" value="{{ $trabajo->fecha_trabajo }}">
        <br>
        <label for="cargo_trabajo" class="form-label">Cargo:</label>
        <input type="text" id="cargo_trabajo" name="cargo_trabajo" class="form-control" value="{{ $trabajo->cargo_trabajo }}">
        <br>
        <button type="submit" class="btn btn-primary col-md-12 my-2">Actualizar Formacion</button>
    </form>

</div>
@else
    <p class="text-center">Esta es una vista de usuario</p>
@endif
@endsection