@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
@php
  use App\Models\User;
  use App\Models\Formacion;
  use App\Models\Trabajo;
  $trabajadorId =request()->route('id');
  $user = User::find($trabajadorId);
@endphp
@if(auth()->user()->role == 'role' || auth()->user()->role != null)
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-5xl text-center pt-24">Perfil de {{ $user->name }}</h2>
    </div>
    <div class="col-md-12 my-2">
      <p>Email: {{ $user->email }} <br></p> 
    </div>
    <div class="col-md-12 my-2">
      <p>Dirección: {{ $user->street }}, {{ $user->city }}, {{ $user->country }}<br></p> 
    
    </div>
    <div class="col-md-12 my-2">
    <p>Teléfono: {{ $user->phone }}</p>
    </div>
    <hr>
    <div class="container mt-5 ">
    <h2 class="text-center my-2">Formaciones</h2>
    
    <table class="table">
        <thead>
            <tr>
            
                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th scope="col">Grado</th>
            </tr>
        </thead>
        <tbody>
            @php 
              $formaciones = Formacion::where('trabajador', $user->id)->get();

            @endphp
            @foreach($formaciones as $formacion)
                <tr>
                 
                    <td>{{ $formacion->nombre_formacion }}</td>
                    <td>{{ $formacion->fecha_formacion }}</td>
                    <td>{{ $formacion->grado_formacion }}</td>
                
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container mt-5">
    <h2 class="text-center my-2">Trabajos</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cargo</th>
            </tr>
        </thead>
        <tbody>
            @php 
                $trabajos = Trabajo::where('trabajador', $user->id)->get();
            @endphp

            @foreach($trabajos as $trabajo)
                <tr>
                    <td>{{ $trabajo->nombre_trabajo }}</td>
                    <td>{{ $trabajo->fecha_trabajo }}</td>
                    <td>{{ $trabajo->cargo_trabajo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <div class="col-md-12">
      <a href="{{ route('admin.index') }}" class="btn btn-primary col-md-12 my-2">Volver</a>
    </div>
    
  
</div>
@else
<p class="text-center">Esta es una vista de administrador</p>
@endif

@endsection