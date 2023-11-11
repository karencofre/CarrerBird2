@extends('layouts.app')

@section('title', 'Home')

@section('content')
    
  <h2 class="text-5xl text-center pt-24">Bienvenido Admin</h2>
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
                        <a href="{{ route('empleo.updateEmpleo', $empleo->id) }}">
                            <button class="form-group btn btn-primary" type="submit">Editar</button>
                        </a>
                         <a onclick="confirm('¿Está seguro que desea eliminar el empleo?')">
                        <form action="{{ route('empleo.destroy', $empleo->id) }}" method="POST">
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

</div>

@endsection
