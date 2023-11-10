<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formacion;
class FormacionController extends Controller
{
    //
    public function store(Request $request){
        $userId = auth()->id();

        $formacion = new Formacion();
        $formacion->nombre_formacion = $request->institucion;
        $formacion->fecha_formacion = $request->fecha;
        $formacion->grado_formacion = $request->grado;
        $formacion->trabajador = $userId;
        $formacion->save();
        return redirect()->route('formacion.index')->with('success', 'Formacion creado correctamente');
    }

    public function index(){
        $formaciones = Formacion::all();
        return view('home', ['formaciones',$formaciones]);
    }

    public function show(){
        $formacion = Formacion::find($id);
        return view('formacion.show', ['formacion',$formacion]);
    }

    public function edit (string $id){
        $formacion = Formacion::find($id);
        return view('formacion.edit', ['formacion',$formacion]);
    }

    public function update(Request $request,string $id){
        $formacion = Formacion::find($id);
        $formacion->fill($request->all());
        $formacion->save();
        return redirect()->route('formacion.index')->with('success', 'Formacion actualizado correctamente');
    }

    public function destroy(string $id){
        $formacion = Formacion::find($id);
        $formacion->delete();
        return redirect()->route('formacion.index')->with('success', 'Formacion eliminado correctamente');
    }

    public function create(){
        return view('formacion.create');
    }
}
