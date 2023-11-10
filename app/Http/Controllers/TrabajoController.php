<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    //
    public function store(Request $request){
        $userId = auth()->id();
        $trabajo = new Trabajo();

        $trabajo->nombre_trabajo = $request->institucion;
        $trabajo->fecha_trabajo = $request->fecha;
        $trabajo->cargo_trabajo = $request->cargo;
        $trabajo->trabajador = $userId;
        $trabajo->save();
        return redirect()->route('trabajo.index')->with('success', 'Trabajador creado correctamente');
    }

    public function index(){
        $trabajadores = Trabajador::all();
        return view('home', ['trabajadores',$trabajadores]);
    }

    public function show(string $id){
        $trabajador = Trabajador::find($id);
        return view('curriculums', ['trabajador',$trabajador]);
    }

    public function edit (string $id){
        $trabajador = Trabajador::find($id);
        return view('perfil', ['trabajador',$trabajador]);
    }

    public function update(Request $request,string $id){
        $trabajador = Trabajador::find($id);
        $trabajador->nombre = $request->nombre;
        $trabajador->apellido = $request->apellido;
        $trabajador->correo = $request->correo;

        $trabajador->renta = $request->renta;
        $trabajador->save();
        return redirect()->route('perfil')->with('success', 'Trabajador actualizado correctamente');
    }

    public function destroy(string $id){
        $trabajador = Trabajador::find($id);
        $trabajador->delete();
        return redirect()->route('perfil')->with('success', 'Trabajador eliminado correctamente');
    }

    public function create(){
        return view('curriculums');
    }

    public function eliminarTrabajador($id) {
        Trabajo::where('trabajador', $id)->delete();
        Trabajador::destroy($id);

        return;
    }
    public function editarTrabajador($id) {
        $trabajador = Trabajador::find($id);

        if ($trabajador) {
            return view('actualizar', compact('trabajador'));
        } else {

        }
    }
}
