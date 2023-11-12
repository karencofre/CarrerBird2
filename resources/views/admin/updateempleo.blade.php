@extends('layouts.app')

@section('title', 'Home')

@section('content')
@if(auth()->user()->role == 'role' || auth()->user()->role != null)

<div class="container">
  <form action="{{ route('empleo.update', $empleo->id) }}"method="POST">
        @csrf

        <label for="cargo" class="form-label">Cargo:</label>
        <input type="text" id="cargo" name="cargo" class="form-control"  value="{{ $empleo->cargo }}">
        <br>

        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea id="descripcion" class="form-control" name="descripcion" value="{{ $empleo->descripcion}}"></textarea>
        <br>

        <label for="renta" class="form-label">Renta:</label>
        <input type="number" id="renta" class="form-control" name="renta" value="{{ $empleo->renta }}">
        <br>
        <label for="requisito" class="form-label">Requisito:</label>
        <input type="text" id="requisito" name="requisito" class="form-control" value="{{ $empleo->requisito }}">
        <br>
        <button type="submit" class="btn btn-primary col-md-12 my-2">Actualizar Empleo</button>
    </form>

</div>
@else
    <p class="text-center">Esta es una vista de administrador</p>
@endif
@endsection