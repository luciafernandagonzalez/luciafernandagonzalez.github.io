<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tecnicos');
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->bigInteger('tecnico_legajo')->unsigned();
            $table->string('nombre',10);
            $table->string('apellido',10);
            $table->integer('dni');
            $table->string('direccion',30);
            $table->integer('telefono',15);
            $table->integer('proveedor_legajo');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecnicos');
    }
}
