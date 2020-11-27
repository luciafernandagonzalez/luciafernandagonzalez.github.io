<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    //
    protected $primaryKey = "control_codigo";
    protected $fillable = ['control_codigo', 'tecnico_legajo', 'tipo', 'fecha', 'hora'];

    public function tecnico(){
        return $this->belongsTo('App\Tecnico', 'tecnico_legajo', 'control_codigo');
    }
}
