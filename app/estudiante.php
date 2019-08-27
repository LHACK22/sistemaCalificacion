<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    protected $fillable = ['nombre','apellido','nombreCompleto','grado','seccion'];
}
