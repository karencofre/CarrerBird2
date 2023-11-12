<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Carrer Bird</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cosmo/bootstrap.min.css" integrity="sha384-5QFXyVb+lrCzdN228VS3HmzpiE7ZVwLQtkt+0d9W43LQMzz4HBnnqvVxKg6O+04d" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
  </head>
  <body class="bg-gray-100 text-gray-800">

    <nav class="flex py-5 text-white  navbar navbar-expand-lg bg-dark">
      <div class="w-1/2 px-12 mr-auto container-fluid">
        <p class="text-2xl font-bold">Carrer Bird</p>
      </div>

      <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
      @if(auth()->check())
        <li class="mx-8">
          <p class="text-xl">Welcome <b>{{ auth()->user()->name }}</b></p>
        </li>
    

        <li>
          <a href="{{ route('admin.index') }}" class="font-bold
          py-3 px-4 mx-2 rounded-md  hover:bg-red-600">Admin</a>
        </li>
        
        <li>
          <a href="{{ route('login.destroy') }}" class="font-bold
          py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">Log Out</a>
        </li>
        
      @else
        <li class="mx-6">
          <a href="{{ route('login.index') }}" class="font-semibold 
          hover:bg-indigo-700 py-3 px-4 rounded-md">Log In</a>
        </li>
        <li>
          <a href="{{ route('register.index') }}" class="font-semibold
          border-2 border-white py-2 px-4 rounded-md hover:bg-white 
          hover:text-indigo-700">Register</a>
        </li>
      @endif
      </ul>

    </nav>
  <div class="hero bg-primary text-white text-center mb-5">
      </div>
<h1 class="text-center my-5 text-black">CarrerBird</h1>


    @yield('content')

 
    <div class="container-fluid bg-dark">
        <section class="mt-5">
            <h2 class="text-center">Colaboradores</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="colaborador1.jpg" class="card-img-top" alt="Colaborador 1">
                        <div class="card-body">
                            <h5 class="card-title">Nombre del Colaborador 1</h5>
                            <p class="card-text">Descripción o rol del colaborador 1.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="colaborador2.jpg" class="card-img-top" alt="Colaborador 2">
                        <div class="card-body">
                            <h5 class="card-title">Nombre del Colaborador 2</h5>
                            <p class="card-text">Descripción o rol del colaborador 2.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="colaborador3.jpg" class="card-img-top" alt="Colaborador 3">
                        <div class="card-body">
                            <h5 class="card-title">Nombre del Colaborador 3</h5>
                            <p class="card-text">Descripción o rol del colaborador 3.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
     <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Redes Sociales</h5>
                    <div class="d-flex justify-content-center">
                        <a href="https://github.com/karencofre" class="text-light mx-2" target="_blank">GitHub</a>
                        <a href="https://www.linkedin.com/in/karen-cofre-cejas" class="text-light mx-2" target="_blank">LinkedIn</a>
                        <a href="https://www.instagram.com/neural_tutor" class="text-light mx-2" target="_blank">Instagram</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <h5>Contacto</h5>
                    <p>
                        <strong>Teléfono:</strong> +123 456 789<br>
                        <strong>Correo:</strong> ejemplo@example.com
                    </p>
                </div>
                <div class="col-md-3">
                    <h5>Navegacion</h5>
                    <nav class="nav justify-content-center">
                        <a class="nav-link text-light" href="#">Inicio</a>
                        <a class="nav-link text-light" href="#">Perfil</a>
                    </nav>
                </div>
            </div>
        </div>

      </footer>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </body>
</html>