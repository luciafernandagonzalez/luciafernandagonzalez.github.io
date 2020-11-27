<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Proveedor extends Model
{
    //Un proveedor tiene muchos tecnicos

    protected $primaryKey = "proveedor_legajo";
    protected $fillable = ['proveedor_legajo','nombre','apellido','dni','direccion', 'telefono', 'calificacion'];

    public function tecnicos(){
        return $this->hasMany('App\Tecnico', 'tecnico_legajo');
    }

    public function equipos(){
        return $this->hasMany('App\Equipo', 'equipo_codigo');
    }
}
