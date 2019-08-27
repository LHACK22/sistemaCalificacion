<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calificacion extends Model
{
    protected $fillable = ['idAsignatura','idEstudiante','idUser','Bajo','Basico','Alto','Superior'];

    public function scopeGrado($query, $grado)
    {
        if($grado)
            return $query
            ->where('estudiantes.grado', '=', "$grado");
    }

    public function scopeSeccion($query, $seccion)
    {
        if($seccion)
            return $query
            ->where('estudiantes.seccion', '=', "$seccion");
    }

    public function scopeAsignatura($query, $asignatura)
    {
        if($asignatura)
            return $query
            ->where('calificacions.idAsignatura', '=', "$asignatura");
    }
}
