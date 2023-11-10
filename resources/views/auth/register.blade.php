@extends('layouts.app')

@section('title', 'Register')

@section('content')


<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
rounded-lg shadow-lg">

  <h1 class="text-3xl text-center font-bold">Register</h1>

  <form class="mt-4" method="POST" action="">
    @csrf

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Name"
    id="name" name="name">

    @error('name')        
      <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}</p>
    @enderror

    <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email"
    id="email" name="email">

    @error('email')        
      <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}</p>
    @enderror

    <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Password"
    id="password" name="password">

    @error('password')        
      <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}</p>
    @enderror

    <input type="password" class="border border-gray-200 rounded-md bg-gray-200 
    w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" 
    placeholder="Password confirmation" id="password_confirmation" 
    name="password_confirmation">
    
    <!-- agregado-->


    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Street"
    id="street" name="street">


    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="City"
    id="city" name="city">

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Country"
    id="country" name="country">

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Phone"
    id="phone" name="phone">

    
    <label  for="admin">Admin</label>
    <input type="radio" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Admin"
    id="admin" name="role" value="admin"  onclick="showInput()">

    <label for="usuario">Usuario</label>
    <input type="radio" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Usuario" id="usuario" name="role" value="usuario"
    onclick="hideInput()" >

    <div id="adminInput" style="display: none;">
            <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Organization" id="adminInput" name="organization"
    onclick="confirmOrg()" >
    </div>

    <!--end agregado-->

    <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg
    text-white font-semibold p-2 my-3 hover:bg-indigo-600">Send</button>


  </form>


</div>
<script>
        function showInput() {
            document.getElementById('adminInput').style.display = 'block';
        }

        function hideInput() {
            document.getElementById('adminInput').style.display = 'none';
        }

         function confirmOrg() {
            // Código específico para confirmar la eliminación
            var codigo = "1234";
            
            var userInput = prompt("Ingrese el código para confirmar la organización:");

            if (userInput !== null && userInput === codigo) {
                // Aquí puedes poner el código para eliminar la organización
                alert("Organización confiramada correctamente.");
            } else {
                alert("Organizacion incorrecta.");
            }
        }
    </script>
    </script>
@endsection