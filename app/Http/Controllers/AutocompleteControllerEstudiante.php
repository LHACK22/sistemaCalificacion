<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Estudiante;
use App\Repositories\EstudianteRepository;

class AutocompleteControllerEstudiante extends Controller
{

    private $estudianteRepo;

    public function __CONSTRUCT(EstudianteRepository $estudianteRepo)
    {
        $this->_estudianteRepo = $estudianteRepo;
    }

    public function findEstudiante(Request $req)
    {
      return $this->_estudianteRepo
                  ->findByName($req->input('q'));
    }
}
