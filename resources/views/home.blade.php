@extends('layouts.app')

@section('title', 'Home')

@section('content')
    
  <h1 class="text-5xl text-center pt-24">Welcome to my application User</h1>

<div class="container">
  
    <h2>Formacion Academica:</h2>
    <form action="{{route('formacion.store')}}" method="POST">
        @csrf
     

        <div class="mb-3">
            <label for="institucion" class="form-label">Institucion</label>
            <input type="text" class="form-control" id="institucion" name="institucion">
            <label for="lugar" class="form-label">Lugar</label>
            <input type="text" class="form-control" id="fecha" name="fecha">
            <label for="grado" class="form-label">Grado</label>
            <input type="text" class="form-control" id="grado" name="grado">

        </div>
        <div class="container">
            <div class="row">
                <button type="submit" class="btn btn-primary col-md-12 my-2">Guardar</button>
            </div>
        </div>

    </form>

</div>
@endsection