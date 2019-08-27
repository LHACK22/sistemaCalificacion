<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion_preguntas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('idAsignatura')->unsigned();
            $table->biginteger('idUser')->unsigned();
            $table->integer('idGrado');
            $table->integer('idCurso');
            $table->biginteger('idPregunta')->unsigned();
            $table->integer('cantidad');

            $table->foreign('idAsignatura')
            ->references('id')->on('asignaturas');

            $table->foreign('idUser')
            ->references('id')->on('users');

            $table->foreign('idGrado')
            ->references('id')->on('grados');

            $table->foreign('idCurso')
            ->references('id')->on('seccions');

            $table->foreign('idPregunta')
            ->references('id')->on('preguntas');


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
        Schema::dropIfExists('calificacion_preguntas');
    }
}
