<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  use App\Models\User;

class UserController extends Controller
{
    //
    public function updateUser(Request $request,string $id){
        $user = User::find($id);

        if ($user) {
            return view('user.update', compact('user'));
        }
        return redirect()->route('home');
    }
      public function update(Request $request,string $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->street = $request->street;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->phone = $request->phone;
 
        $user->save();
        return redirect()->route('home')->with('success', 'empleo actualizado correctamente');
    }
}
