<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cantidadNivelesGrado extends Model
{
    protected $fillable = ['idGrado','idAsignatura','cBajo','cBasico','cAlto','cSuperior'];

    
    public function scopeGrado($query, $grado)
    {
        if($grado)
            return $query
            ->where('idGrado', '=', "$grado");
    }

    public function scopeAsignatura($query, $asignatura)
    {
        if($asignatura)
            return $query
            ->where('idAsignatura', '=', "$asignatura");
    }
}
