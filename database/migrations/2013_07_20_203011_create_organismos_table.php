<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganismosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organismos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_propietario');
            $table->string('apellido_propietario');
            $table->string('telefono_propietario');
            $table->string('nombre_negocio');
            $table->string('telefono_negocio');
            $table->string('username');
            $table->string('status')->default(0);
            // role asociado
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('organismos');
    }
}
