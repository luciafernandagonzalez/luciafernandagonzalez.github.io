<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Tecnico;
use App\Proveedor;
use App\events;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $tecnicos = Tecnico::all();
       $proveedors = Proveedor::all();
       return view('tecnicos.listado',['tecnicos'=>$tecnicos, 'proveedors'=>$proveedors]);
    }

    public function create()
    {
        //
       $tecnicos = Tecnico::all();
       return view('tecnicos.listado',['tecnicos'=>$tecnicos]);
    }
    /**
     * Store a newly creard resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'legajo' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'direccion' => 'required',
            'telefono' => 'required'
        ]);

        $tecnico = new Tecnico([
            'legajo' => $request->input('legajo'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'dni' => $request->input('dni'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
        ]);
        $tecnico->save();
        //return redirect()->route('tecnicos.crear')->with('info', 'Tecnico creado');
    }

    public function getStore(){

        $tecnicos = Tecnico::all();
       //return view('tecnicos.crear',['tecnicos'=>$tecnicos]);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $tecnicos = Tecnico::where('proveedor_legajo','=', $request->legajo)->get();
        return view('tecnicos.listado', ['tecnicos'=>$tecnicos]);
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */

    public function getUpdate($legajo){

        $tecnicos = new Tecnico();
        $tecnicos = $tecnicos->getTecnico($legajo);
        return view('tecnicos.crear',['tecnicos'=>$tecnicos]);
    }
    public function update(Request $request, Tecnico $tecnico)
    {
        //
        $tecnico = Tecnico::find($request->input('legajo'));
        $tecnico->nombre = $request->input('nombre');
        $tecnico->apellido = $request->input('apellido');
        $tecnico->dni = $request->input('dni');
        $tecnico->direccion = $request->input('direccion');
        $tecnico->telefono = $request->input('telefono');
        $tecnico->calificacion = $request->input('calificacion');
        $tecnico->save();  
        return view('tecnicos.crear',['tecnicos'=>$tecnicos]);  
    }

    public function traerTecnicos(Request $request){

        $proveedors = Proveedor::where('proveedor_legajo', '=', $request->legajo)->get();
        return view('tecnicos.listado', ["proveedors" => $proveedors]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnico $tecnico)
    {
        //
        $tecnico = Tecnico::find($legajo);
        if($tecnico != null){

            $tecnico->delete();
            return redirect()->route('tecnicos.crear');
        }

        return redirect()->route('tecnicos.crear')->with(['message' => 'Id incorrecto!']);
    }


}
