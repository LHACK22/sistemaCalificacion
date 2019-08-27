<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Asignatura;
use App\Calificacion;
use App\Grado;
use App\Seccion;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignatura::all()->toArray();
        return view ('Calificaciones.index', compact('asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $calificaciones = new Calificacion([
            'idAsignatura' => $request->get('asignatura'),
            'idEstudiante' => $request->get('estudiante'),
            'idUser' => $request->get('user'),
            'Bajo' => $request->get('bajo'),
            'Basico' => $request->get('basico'),
            'Alto' => $request->get('alto'),
            'Superior' => $request->get('alto')
        ]);

        $calificaciones->save();
        return redirect('/Calificaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $grado = $request->get('grado');
        $seccion = $request->get('seccion');
        $asignatura = $request->get('asignatura');

        $grados = Grado::find($request->get('grado'));
        $seccions = Seccion::find($request->get('seccion'));
        $asignaturas = Asignatura::find($request->get('asignatura'));

        if ($seccion) {
            $nombreGrado = $grados->nombre;
            $nombreAsignatura = $asignaturas->nombre;
            $nombreSeccion = $seccions->nombre;
        }
        
        else
        {
            $nombreGrado = $grados->nombre;
            $nombreAsignatura = $asignaturas->nombre;
            $nombreSeccion = "En General";
        }


        $bajo = 0;
        $basico = 0;
        $alto = 0;
        $superior = 0;

        $calificaciones = Calificacion::orderBy('id','DESC')
        ->join('estudiantes', 'calificacions.idEstudiante', '=', 'estudiantes.id')
        ->select('calificacions.*')
        ->grado($grado)
        ->seccion($seccion)
        ->asignatura($asignatura)
        ->get();

        foreach($calificaciones as $t)
        {
            $b = $t->Bajo;
            $ba = $t->Basico;
            $al = $t->Alto;
            $sup = $t->Superior;

            $bajo = $bajo + $b;
            $basico = $basico + $ba;
            $alto = $alto + $al;
            $superior = $superior + $sup;
        }

        return view ('Calificaciones.show', compact('bajo','basico','alto','superior','nombreGrado','nombreAsignatura','nombreSeccion'));

    }

    public function report()
    {
        $grados = Grado::all()->toArray();
        $seccions = Seccion::all()->toArray();
        $asignaturas = Asignatura::all()->toArray();
        return view ('Calificaciones.report', compact('grados','seccions','asignaturas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
