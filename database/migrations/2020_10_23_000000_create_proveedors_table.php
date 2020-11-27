<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('proveedors');
        Schema::create('proveedors', function (Blueprint $table) {
            $table->integer('proveedor_legajo')->unsigned();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('dni');
            $table->string('direccion');
            $table->integer('telefono');
            $table->integer('calificacion')->nullable();
            

            $table->timestamps();

            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedors');
      
    }
}
