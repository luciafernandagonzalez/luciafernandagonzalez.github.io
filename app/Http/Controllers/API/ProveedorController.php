<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Proveedor;
use App\Tecnico;
use App\events;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request; //para obtener instancia de la solicitud HTTP

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //nos muestra todos los proveedores
       $proveedors = Proveedor::all();
       
       //$proveedors = Proveedor::orderBy('created_at', 'desc')->get();  

       return view('proveedors.create',['proveedors'=>$proveedors]);
       
      
    }
    public function create()
    {
        //
       $proveedors = Proveedor::all();
       $tecnicos = Tecnico::all();
       return view('proveedors.create',['proveedors'=>$proveedors, 'tecnicos'=>$tecnicos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getStore(){

        $proveedors = Proveedor::all();
       return view('proveedors.create',['proveedors'=>$proveedors]);

    }

    public function store(Request $request)
    {

        $proveedors = Proveedor::all();
        
        $this->validate($request, [
            'proveedor_legajo' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'direccion' => 'required',
            'telefono' => 'required'
        ]);

        $proveedor = new Proveedor([
            'proveedor_legajo' => $request->input('proveedor_legajo'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'dni' => $request->input('dni'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'calificacion' => $request->input('calificacion')
        ]);
        $proveedor->save();
        return redirect()->back();
        //return view('proveedors.create');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
      //  return view('proveedors.create');
      //$proveedor = Proveedor::find($legajo);
      // return response() ->json($proveedor);
      $proveedors = Proveedor::all();
      return view('proveedors.create',['proveedors'=>$proveedors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */

    public function getUpdate($proveedor_legajo){

        $proveedors = new Proveedor();
        $proveedors = Proveedor::where('proveedor_legajo','=', $proveedor_legajo)->get();
        return view('proveedors.update',['proveedors'=>$proveedors]);
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor = Proveedor::find($request->input('proveedor_legajo'));
        $proveedor->nombre = $request->input('nombre');
        $proveedor->apellido = $request->input('apellido');
        $proveedor->dni = $request->input('dni');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->calificacion = $request->input('calificacion');
        $proveedor->save();  

        return redirect()->route('proveedors.create');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($proveedor_legajo)
    {
        //
        $proveedor = Proveedor::find($proveedor_legajo);
        if($proveedor != null){

            $proveedor->delete();
            return redirect()->route('proveedors.create');
        }

        return redirect()->route('proveedors.create')->with(['message' => 'Id incorrecto!']);
        
    }
    /**
     * almacena un nuevo comentario en el artículo seleccionado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    /**public function addTecnico(Request $request, Proveedor $proveedor){
        $proveedor
                ->tecnicos()
                ->create( $request->all() );
        return $proveedor;
    }*/

    public function addTecnico($legajo){
        //$proveedor = Proveedor::where('legajo', $legajo)->with('tecnicos')->first();
        $proveedor = Proveedor::find(1);
        $tecnico = new Tecnico();
        $proveedor->tecnicos()->save($tecnico);
        return redirect()->back();
    }

    /**
     * retorna todos los comentarios asociados al artículo seleccionado
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function getTecnicos(Proveedor $proveedor){
        return $proveedor->tecnicos;
    }

    public function calificaciones(){
        $proveedors = Proveedor::orderBy('calificacion', 'desc')->get();
        return view('proveedors.calificaciones', ['proveedors'=>$proveedors]);
    }

}
