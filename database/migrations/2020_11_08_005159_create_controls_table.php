<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('controls');
        Schema::create('controls', function (Blueprint $table) {
            $table->integer('control_codigo')->unsigned();
            $table->string('tipo');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('tecnico_legajo');

            
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
        Schema::dropIfExists('controls');
    }
}
