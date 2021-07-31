<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoReparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_reparaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->smallInteger('status')->default(0);
            $table->string('fecha')->default(date('d/m/Y'));
            $table->integer('organismo_id')->unsigned()->nullable();
            $table->foreign('organismo_id')->references('id')->on('organismos');
            $table->integer('sucursal_id')->unsigned()->nullable();
            $table->foreign('sucursal_id')->references('id')->on('sucursales');
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
        Schema::dropIfExists('tipo_reparaciones');
    }
}
