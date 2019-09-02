<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asistenciaCurso extends Model
{
    protected $fillable = ['idGrado','idCurso','idAsignatura','cantidad'];

    public function scopeGrado($query, $grado)
    {
        if($grado)
            return $query
            ->where('idGrado', '=', "$grado");
    }

    public function scopeCurso($query, $curso)
    {
        if($curso)
            return $query
            ->where('idCurso', '=', "$curso");
    }

    public function scopeAsignatura($query, $asignatura)
    {
        if($asignatura)
            return $query
            ->where('idAsignatura', '=', "$asignatura");
    }
}
