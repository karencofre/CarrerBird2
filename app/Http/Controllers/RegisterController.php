<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller {
    
    public function create() {
        
        return view('auth.register');
    }

    public function store(Request $request) {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            // agregado
            'street' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required',
        ]);


        if($request->has('role')){
            $user = User::create(request(['name', 'email', 'password','street','city','country','phone','role','organization']));

        }else{
            $user = User::create(request(['name', 'email', 'password','street','city','country','phone','role']));

        }
        
        auth()->login($user);
        return redirect()->to('/');
    }
}
