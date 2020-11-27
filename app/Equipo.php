<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    //
    protected $primaryKey = "equipo_codigo";
    protected $fillable = ['equipo_codigo', 'nombre', 'modelo', 'fechaCompra', 'vencGarantia'];

    public function proveedor(){
        return $this->belongsTo('App\Proveedor', 'proveedor_legajo');
    }

}
