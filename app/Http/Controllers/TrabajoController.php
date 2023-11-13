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
        $trabajo = Trabajo::all();
        return view('home', ['trabajo',$trabajo]);
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
        return redirect()->route('home')->with('success', 'Trabajador eliminado correctamente');
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

      public function updateTrabajo(Request $request,string $id){
        $trabajo = Trabajo::find($id);

        if ($trabajo) {
            return view('updatetrabajo', compact('trabajo'));
        }
        return redirect()->route('trabajo.index');
    }
      public function update(Request $request,string $id){
        $trabajo= Trabajo::find($id);
        $trabajo->nombre_trabajo = $request->nombre_trabajo;
        $trabajo->fecha_trabajo = $request->fecha_trabajo;
        $trabajo->cargo_trabajo = $request->cargo_trabajo;
 
        $trabajo->save();
        return redirect()->route('trabajo.index')->with('success', 'trabajo actualizado correctamente');
    }
}
