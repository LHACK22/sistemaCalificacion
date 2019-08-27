<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Asignatura;
use App\Calificacion;

class ReporteCalificacionesController extends Controller
{

    public function index()
    {
        $asignaturas = Asignatura::all()->toArray();
        return view ('Calificaciones.index', compact('asignaturas'));
    }

}
