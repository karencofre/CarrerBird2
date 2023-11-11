<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empleo;

class EmpleoController extends Controller
{
    //
    public function store(Request $request){
        $userId = auth()->id();
        $empleo = new Empleo();
        $empleo->cargo = $request->cargo;
        $empleo->descripcion = $request->descripcion;
        $empleo->renta = $request->renta;
        $empleo->requisito = $request->requisito;
        $empleo->trabajador = $userId;
        $empleo->save();
        return redirect()->route('empleo.index')->with('success', 'empleo creado correctamente');
    }

    public function index(){
        $empleo = Empleo::all();
        return view('admin.index', ['empleo',$empleo]);
    }
    public function destroy(string $id){
        $empleo = empleo::find($id);
        $empleo->delete();
        return redirect()->route('admin.index')->with('success', 'empleo eliminado correctamente');
    }
}
