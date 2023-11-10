<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajo;

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
        $trabajadores = Trabajo::all();
        return view('home', ['trabajadores',$trabajadores]);
    }

    public function show(string $id){
        $trabajador = Trabajo::find($id);
        return view('curriculums', ['trabajador',$trabajador]);
    }

    public function edit (string $id){
        $trabajador = Trabajo::find($id);
        return view('perfil', ['trabajador',$trabajador]);
    }

   

    public function destroy(string $id){
        $trabajador = Trabajo::find($id);
        $trabajador->delete();
        return redirect()->route('perfil')->with('success', 'Trabajador eliminado correctamente');
    }

    public function create(){
        return view('home');
    }

    public function eliminarTrabajo($id) {
        Trabajo::where('trabajador', $id)->delete();
        Trabajo::destroy($id);

        return;
    }
    public function editarTrabajor($id) {
        $trabajo = Trabajo::find($id);

        if ($trabajo) {
            return view('actualizar', compact('trabajador'));
        } else {

        }
    }
}
