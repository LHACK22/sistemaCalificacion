<?php

namespace App\Repositories;

use App\Estudiante;

class EstudianteRepository{

    private $model;
    private $response;

    public function __construct(){
        $this->model = new Estudiante();
    }

    public function findByName($q){
        return $this->model
        ->join('grados', 'estudiantes.grado', '=', 'grados.id')
        ->join('seccions', 'estudiantes.seccion', '=', 'seccions.id')
        ->select('estudiantes.*', 'grados.nombre AS nombreGrado','seccions.nombre AS nombreSeccion')
        ->where('nombreCompleto','LIKE',"%$q%")
        ->get();
    }

}
