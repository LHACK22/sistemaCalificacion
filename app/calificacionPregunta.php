<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calificacionPregunta extends Model
{
    protected $fillable = ['idAsignatura','idUser','idGrado','idCurso','idPregunta','cantidad'];

    public function scopeGrado($query, $grado)
    {
        if($grado)
            return $query
            ->where('calificacion_preguntas.idGrado', '=', "$grado");
    }

    public function scopeCurso($query, $curso)
    {
        if($curso)
            return $query
            ->where('calificacion_preguntas.idCurso', '=', "$curso");
    }

    public function scopeAsignatura($query, $asignatura)
    {
        if($asignatura)
            return $query
            ->where('calificacion_preguntas.idAsignatura', '=', "$asignatura");
    }
}
