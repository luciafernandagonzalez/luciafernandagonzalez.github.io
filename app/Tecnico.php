<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{

    protected $primaryKey = "tecnico_legajo";
    protected $fillable = ['tecnico_legajo','nombre','apellido','dni','direccion', 'telefono'];

    //Un tecnico pertenece a un proveedor
    public function proveedor(){
        return $this->belongsTo('App\Proveedor', 'proveedor_legajo', 'tecnico_legajo');
    }
    
    public function control(){
        return $this->hasMany('App\Control', 'control_codigo', 'tecnico_legajo');
    }
}
