<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class totalCalificacionPregunta extends Model
{
     protected $fillable = ['idAsignatura','idUser','idGrado','idCurso','idPregunta','cantidad'];

    public function scopeGrado($query, $grado)
    {
        if($grado)
            return $query
            ->where('total_calificacion_preguntas.idGrado', '=', "$grado");
    }

    public function scopeAsignatura($query, $asignatura)
    {
        if($asignatura)
            return $query
            ->where('total_calificacion_preguntas.idAsignatura', '=', "$asignatura");
    }

     public function scopePregunta($query, $pregunta)
    {
        if($pregunta)
            return $query
            ->where('total_calificacion_preguntas.idPregunta', '=', "$pregunta");
    }
}
