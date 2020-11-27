<?php

namespace App\Http\Controllers\API;

use App\Control;
use App\Tecnico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\events;
use Illuminate\Support\Facades\Redirect;

class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //return view('tecnicos.listado');
       $tecnicos = Tecnico::all();
       $controls = Control::all();
       return view('tecnicos.listado',['tecnicos'=>$tecnicos, 'controls'=>$controls]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getStore(){

        $tecnicos = Tecnico::all();
        $controls = Control::all();
        return view('tecnicos.listado', ['controls'=>$controls, 'tecnicos'=>$tecnicos]);
    }

    public function store(Request $request)
    {
        //     

        $controls = Control::all();
        
        $this->validate($request, [
            'control_codigo' => 'required',
            'tecnico_legajo' => 'required',
            'tipo' => 'required',
            'fecha' => 'required',
            'hora' => 'required'
        ]);

        $tecnico = Tecnico::find($request->input('tecnico_legajo'));

        $control = new Control([
            'control_codigo' => $request->input('control_codigo'),
            //'tecnico_legajo' => $request->input('tecnico_legajo'),
            'tipo' => $request->input('tipo'),
            'fecha' => $request->input('fecha'),
            'hora' => $request->input('hora')
        ]);
        $control->save();
        $control->tecnicos()->associate($tecnico);
        return view('tecnicos.listado',['controls'=>$controls]);
        //return redirect()->back();
        
    }

    public function create()
    {
        //
       $tecnicos = Tecnico::all();
       $controls = Control::all();
       return view('tecnicos.listado',['tecnicos'=>$tecnicos, 'controls'=>$controls]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $controls = Control::all();
        $tecnicos = Tecnico::where('proveedor_legajo','=', $request->legajo)->get();
        return view('tecnicos.listado', ['tecnicos'=>$tecnicos, 'controls'=>$controls]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Control $control)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control $control)
    {
        //
    }
}
