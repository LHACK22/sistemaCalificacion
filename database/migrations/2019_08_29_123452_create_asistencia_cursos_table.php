<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciaCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencia_cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idGrado');
            $table->integer('idCurso');
            $table->integer('cantidad');

            $table->foreign('idGrado')
            ->references('id')->on('grados');

            $table->foreign('idCurso')
            ->references('id')->on('seccions');
            
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
        Schema::dropIfExists('asistencia_cursos');
    }
}
