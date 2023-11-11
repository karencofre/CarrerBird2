@extends('layouts.app')

@section('title', 'Home')

@section('content')
    
  <h2 class="text-5xl text-center pt-24">Welcome to my application Admin</h2>
<div class="container"> 

    <form action="{{ route('empleo.store') }}" method="POST">
        @csrf

        <label for="cargo" class="form-label">Cargo:</label>
        <input type="text" id="cargo" name="cargo" class="form-control" required>
        <br>

        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea id="descripcion" class="form-control" name="descripcion" required></textarea>
        <br>

        <label for="renta" class="form-label">Renta:</label>
        <input type="number" id="renta" class="form-control" name="renta" required>
        <br>
        <label for="requisito" class="form-label">Requisito:</label>
        <input type="text" id="requisito" name="requisito" class="form-control" >
        <br>
        <button type="submit" class="btn btn-primary col-md-12 my-2">Guardar Empleo</button>
    </form>

    <!--listado de empleos-->
    
</div>

@endsection