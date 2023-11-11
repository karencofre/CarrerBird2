<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habilidad;

class HabilidadController extends Controller
{
    //
    public function store(Request $request){
        $userId = auth()->id();
        $habilidad = new Habilidad();
        $habilidad->nombre_habilidad = $request->habilidad;
        $habilidad->trabajador = $userId;
        $habilidad->save();
        return redirect()->route('habilidad.index')->with('success', 'Trabajador creado correctamente');
    }

    public function index(){
        $habilidad = Habilidad::all();
        return view('home', ['habilidad',$habilidad]);
    }
    public function destroy(string $id){
        $habilidad = Habilidad::find($id);
        $habilidad->delete();
        return redirect()->route('home')->with('success', 'Trabajador eliminado correctamente');
    }
}
