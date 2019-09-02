<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCantidadNivelesGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cantidad_niveles_grados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idGrado');
            $table->biginteger('idAsignatura')->unsigned();
            $table->integer('cBajo');
            $table->integer('cBasico');
            $table->integer('cAlto');
            $table->integer('cSuperior');

            $table->foreign('idGrado')
            ->references('id')->on('grados');

            $table->foreign('idAsignatura')
            ->references('id')->on('asignaturas');

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
        Schema::dropIfExists('cantidad_niveles_grados');
    }
}
