<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('idAsignatura')->unsigned();
            $table->integer('idEstudiante');
            $table->biginteger('idUser')->unsigned();
            $table->integer('Bajo');
            $table->integer('Basico');
            $table->integer('Alto');
            $table->integer('Superior');

            $table->foreign('idAsignatura')
            ->references('id')->on('asignaturas');

            $table->foreign('idEstudiante')
            ->references('id')->on('estudiantes');

            $table->foreign('idUser')
                ->references('id')->on('users');
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
        Schema::dropIfExists('calificacions');
    }
}
