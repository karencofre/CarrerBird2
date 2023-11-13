@extends('layouts.app')
@php

  $formacionId=request()->route('id');
  $formacion = App\Models\Formacion::find($formacionId);
  
@endphp
@section('title', 'Home')

@section('content')
@if(auth()->user()->role == 'null' || auth()->user()->role == null)

<div class="container">
  <form action="{{ route('formacion.update', $formacion->id) }}"method="POST">
        @csrf

        <label for="nombre_formacion" class="form-label">Nombre:</label>
        <input type="text" id="nombre_formacion" name="nombre_formacion" class="form-control"  value="{{ $formacion->nombre_formacion }}">
        <br>


        <label for="fecha_formacion" class="form-label">Fecha:</label>
        <input type="text" id="fecha_formacion" class="form-control" name="fecha_formacion" value="{{ $formacion->fecha_formacion }}">
        <br>
        <label for="grado_formacion" class="form-label">Grado:</label>
        <input type="text" id="grado_formacion" name="grado_formacion" class="form-control" value="{{ $formacion->grado_formacion }}">
        <br>
        <button type="submit" class="btn btn-primary col-md-12 my-2">Actualizar Formacion</button>
    </form>

</div>
@else
    <p class="text-center">Esta es una vista de usuario</p>
@endif
@endsection