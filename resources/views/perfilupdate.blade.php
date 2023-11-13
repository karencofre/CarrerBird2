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
@if(auth()->user()->role == 'null' || auth()->user()->role == null)
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-5xl text-center pt-24">Perfil de {{ $user->name }}</h2>
    </div>

    
<form action="{{ route('user.update', $user->id) }}" method="POST">
  @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
        </div>

        <div class="form-group">
            <label for="street">Calle:</label>
            <input type="text" class="form-control" id="street" name="street" value="{{$user->street}}">
        </div>

        <div class="form-group">
            <label for="city">Ciudad:</label>
            <input type="text" class="form-control" id="city" name="city" value="{{$user->city}}">
        </div>

        <div class="form-group">
            <label for="country">País:</label>
            <input type="text" class="form-control" id="country" name="country" value="{{$user->country}}">
        </div>

        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Datos</button>
    </form>

    <hr>
    <div class="container mt-5 ">
    <h2 class="text-center my-2">Formaciones</h2>
    
    <table class="table">
        <thead>
            <tr>
            
                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th scope="col">Grado</th>
                <th scope="col">Opciones</th>
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
                    <td>

                     <a href="{{ route('formacion.updateFormacion', $formacion->id) }}">
                            <button class="form-group btn btn-primary" type="submit">Editar</button>
                        </a>
                         <a onclick="confirm('¿Está seguro que desea eliminar el empleo?')">
                        <form action="{{ route('formacion.destroy', $formacion->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="form-group btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </a>

                    </td>
                
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
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-5xl text-center pt-24">Perfil de {{ $user->name }}</h2>
    </div>

    
<form action="{{ route('user.update', $user->id) }}" method="POST">
  @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
        </div>

        <div class="form-group">
            <label for="street">Calle:</label>
            <input type="text" class="form-control" id="street" name="street" value="{{$user->street}}">
        </div>

        <div class="form-group">
            <label for="city">Ciudad:</label>
            <input type="text" class="form-control" id="city" name="city" value="{{$user->city}}">
        </div>

        <div class="form-group">
            <label for="country">País:</label>
            <input type="text" class="form-control" id="country" name="country" value="{{$user->country}}">
        </div>

        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
        </div>
        <div class="form-group">
            <label for="organization">Organizacion:</label>
            <input type="text" class="form-control" id="organization" name="organization" value="{{$user->organization}}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Datos</button>
    </form>
</div>
</div>
@endif

@endsection