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
    <div class="container mt-5">
        <h2 class="text-center">Lista de Empleos</h2>

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
                        <a href="{{ route('empleo.update', ['empleo' => $empleo->id]) }}" class="btn btn-primary">Editar</a>
<a href="{{ route('empleo.destroy', ['empleo' => $empleo->id]) }}" class="btn btn-danger">Eliminar</a>

                      </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection