<?php

namespace App\Http\Controllers\API;

use App\Equipo;
use App\Proveedor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\events;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $equipos = Equipo::all();
        //$proveedors = Proveedor::all();
        //return view('equipos.listadoEquipos', ['equipos'=>$equipos, 'proveedors'=>$proveedors]);
        return view('equipos.listadoEquipos', ['equipos'=>$equipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $equipos = Equipo::where('equipo_codigo','=', $request->codigo)->get();
        return view('equipos.listadoEquipos', ['equipos'=>$equipos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        //
    }
}
