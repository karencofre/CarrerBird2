@extends('layouts.app')

@section('title', 'Home')

@section('content')
    
  <h2 class="text-5xl text-center pt-24">Formacion</h2>

<div class="container">
  
    <form action="{{route('formacion.store')}}" method="POST">
        @csrf
     

        <div class="mb-3">
            <label for="institucion" class="form-label">Institucion</label>
            <input type="text" class="form-control" id="institucion" name="institucion">
            <label for="lugar" class="form-label">Fecha</label>
            <input type="text" class="form-control" id="fecha" name="fecha">
            <label for="grado" class="form-label">Grado</label>
            <input type="text" class="form-control" id="grado" name="grado">

        </div>
        <div class="container">
            <div class="row">
                <button type="submit" class="btn btn-primary col-md-12 my-2">Guardar Formacion</button>
            </div>
        </div>

    </form>
    <!--trabajo-->

  <h2 class="text-5xl text-center pt-24">Trabajo</h2>

    <form action="{{route('trabajo.store')}}" method="POST">
        @csrf
        
        <div class="mb-3">

            <label for="institucion" class="form-label">Institucion</label>
            <input type="text" class="form-control" id="institucion" name="institucion">
            <label for="fecha_inicio_e" class="form-label">Fecha</label>
            <input type="text" class="form-control" id="fecha_inicio_e" name="fecha">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" class="form-control" id="cargo" name="cargo">


        </div>
        <div class="container">
            <div class="row">
                <button type="submit" class="btn btn-primary col-md-12 my-2">Guardar Trabajo</button>
            </div>
        </div>
    </form>

    <h2 class="text-5xl text-center pt-24">Habilidad</h2>

    <form action="{{route('habilidad.store')}}" method="POST">
        @csrf
        
        <div class="mb-3">

            <label for="nombre_habilidad" class="form-label">Nombre Habilidad</label>
            <input type="text" class="form-control" id="nombre_habilidad" name="habilidad">
           

        </div>
        <div class="container">
            <div class="row">
                <button type="submit" class="btn btn-primary col-md-12 my-2">Guardar Habilidad</button>
            </div>
        </div>
    </form>

    <h2 class="text-5xl text-center pt-24">Empleos</h2>

    <div class="container mt-5">
        <h2 class="text-center my-2">Lista de Empleos</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Cargo</th>
                    <th>Descripción</th>
                    <th>Renta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
              @php
              use App\Models\Empleo;
              $empleos = Empleo::all();
              @endphp
                @foreach ($empleos as $empleo)
                <tr>
                    <td>{{ $empleo->cargo }}</td>
                    <td>{{ $empleo->descripcion }}</td>
                    <td>{{ $empleo->renta }}</td>
                    <td>
                        <form method="POST" action="{{ route('listado.store', $empleo->id) }}">
                            @csrf
                             <button class="form-group btn btn-primary" type="submit">Postular</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection