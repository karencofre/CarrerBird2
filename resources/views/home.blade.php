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


  <h2 class="text-5xl text-center pt-24">Empleos</h2>
</div>
@endsection