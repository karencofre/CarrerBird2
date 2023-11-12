<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Listado;
use App\Models\Empleo;
use App\Models\Formacion;
use App\Models\Trabajo;
use App\Models\Habilidad;


class ListadoController extends Controller
{
    //

    public function store(Request $request,$id){
        $userId = auth()->id();
        $formaciones = Formacion::where('trabajador', $userId)->get();
        $countFormaciones = $formaciones->count();
        $trabajos = Trabajo::where('trabajador', $userId)->get();
        $countTrabajos = $trabajos->count();
        $listado = new Listado();
        $listado->puntuacion = $countFormaciones * 20 + $countTrabajos * 10;
        $listado->empleo = $id;
        $listado->trabajador = $userId;
        $listado->save();
        return redirect()->route('listado.index')->with('success', 'postulacion creado correctamente');
        
    }

    public function index(){
        $listados = Listado::all();
        return view('home', ['listados',$listados]);
    }
    public function destroy(string $id){
        
        Listado::where('id', $id)->delete();
        Listado::destroy($id);

        return redirect()->route('home');
    }
    public function updateListado(Request $request,string $id){
        $listado = Listado::find($id);

        if ($listado) {
            return view('updatelistado', compact('listado'));
        }
        return redirect()->route('listado.index');
    }
    public function update(Request $request,string $id){
        $listado = Listado::find($id);
        $listado->cargo = $request->cargo;
        $listado->descripcion = $request->descripcion;
        $listado->renta = $request->renta;
        $listado->save();
        return redirect()->route('home')->with('success', 'empleo actualizado correctamente');
    }
    public function show(string $id){
        $listado = Listado::find($id);
        return view('home', ['listado',$listado]);
    }
}
