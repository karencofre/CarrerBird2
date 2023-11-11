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
        
        Empleo::where('id', $id)->delete();
        Empleo::destroy($id);

        return redirect()->route('admin.index');
    }
    public function updateEmpleo(Request $request,string $id){
        $empleo = Empleo::find($id);

        if ($empleo) {
            return view('admin.updateempleo', compact('empleo'));
        }
        return redirect()->route('empleo.index');
    }
      public function update(Request $request,string $id){
        $empleo = Empleo::find($id);
        $empleo->cargo = $request->cargo;
        $empleo->descripcion = $request->descripcion;
        $empleo->renta = $request->renta;
 
        $empleo->save();
        return redirect()->route('admin.index')->with('success', 'empleo actualizado correctamente');
    }
    public function show(string $id){
        $empleo = Empleo::find($id);
        return view('admin.index', ['empleo',$empleo]);
    }
}
