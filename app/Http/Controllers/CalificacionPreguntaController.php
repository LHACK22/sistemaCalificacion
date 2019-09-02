<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;
use App\CalificacionPregunta;
use App\totalCalificacionPregunta;
use App\Grado;
use App\Seccion;
use App\Pregunta;
use App\asistenciaCurso;

class CalificacionPreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $asignaturas = Asignatura::all()->toArray();
        $grados = Grado::all()->toArray();
        $seccions = Seccion::all()->toArray();
        return view ('c_preguntas.index', compact('asignaturas','grados','seccions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $c = 0;
        $asignatura = $request->get('asignatura');

        $preguntas = Pregunta::orderBy('id','ASC')
        ->where('idAsignatura','=',"$asignatura")
        ->get();

        foreach($preguntas as $p)
        {
            $cantidad = $request->get('cantidad'.$c);
            $calificacionesPregunta = new CalificacionPregunta([
                'idAsignatura' => $request->get('asignatura'),
                'idUser' => $request->get('user'),
                'idGrado' => $request->get('grado'),
                'idCurso' => $request->get('curso'),
                'idPregunta' => $p->id,
                'cantidad' => $cantidad
            ]);

            $calificacionesPregunta->save();


            $totalCalificacionPreguntas = totalCalificacionPregunta::orderBy('id','ASC')
            ->grado($request->input('grado'))
            ->asignatura($request->input('asignatura'))
            ->pregunta($p->id)
            ->first();

            if($totalCalificacionPreguntas)
            {
                $totalCalificacionPreguntas -> cantidad = $totalCalificacionPreguntas -> cantidad + $cantidad;
                $totalCalificacionPreguntas->save();
               
            }
            else
            {
                $totalCalificacionPreguntas = new totalCalificacionPregunta([
                'idAsignatura' => $request->get('asignatura'),
                'idUser' => $request->get('user'),
                'idGrado' => $request->get('grado'),
                'idCurso' => 1,
                'idPregunta' => $p->id,
                'cantidad' => $cantidad
                ]);

                $totalCalificacionPreguntas->save();
            }

            $c++;

        }

        $asistencia = new asistenciaCurso([
            'idGrado' => $request->get('grado'),
            'idCurso' => $request->get('curso'),
            'idAsignatura' => $request->get('asignatura'),
            'cantidad' => $request->get('numeroAsistencia')
        ]);

        $asistencia->save();

        return redirect('/CalificacionesPregunta');

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


        if($seccion)
        {

        $nombreGrado = $grados->nombre;
        $nombreAsignatura = $asignaturas->nombre;
        $nombreSeccion = $seccions->nombre;

        $calificacionesPregunta = CalificacionPregunta::orderBy('id','ASC')
        ->join('preguntas', 'calificacion_preguntas.idPregunta', '=', 'preguntas.id')
        ->select('calificacion_preguntas.*','preguntas.pregunta')
        ->grado($grado)
        ->curso($seccion)
        ->asignatura($asignatura)
        ->get();

        $asistencia = asistenciaCurso::orderBy('id','ASC')
        ->grado($grado)
        ->curso($seccion)
        ->asignatura($asignatura)
        ->first();

        $nA = $asistencia->cantidad;

        return view ('c_preguntas.show', compact('nA','calificacionesPregunta','nombreSeccion','nombreGrado','nombreAsignatura'));
        
        }
        else
        {

        $nombreGrado = $grados->nombre;
        $nombreAsignatura = $asignaturas->nombre;
        $nombreSeccion = "En General";

         $calificacionesPregunta = totalCalificacionPregunta::orderBy('id','ASC')
        ->join('preguntas', 'total_calificacion_preguntas.idPregunta', '=', 'preguntas.id')
        ->select('total_calificacion_preguntas.*','preguntas.pregunta')
        ->grado($grado)
        ->asignatura($asignatura)
        ->get();

        $asistencia = asistenciaCurso::orderBy('id','ASC')
        ->grado($grado)
        ->asignatura($asignatura)
        ->get();

        $nA = 0;
        foreach($asistencia as $a)
        {
            $nA = $nA + $a->cantidad;
        }

        return view ('c_preguntas.show', compact('nA','calificacionesPregunta','nombreGrado','nombreAsignatura','nombreSeccion'));
        // return $calificacionesPregunta;
        }
     

        // return $calificacionesPregunta;

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


    public function report()
    {
        $grados = Grado::all()->toArray();
        $seccions = Seccion::all()->toArray();
        $asignaturas = Asignatura::all()->toArray();
        return view ('c_preguntas.report', compact('grados','seccions','asignaturas'));
    }



    public function searchByPreguntas(Request $request, $asignatura)
    {

        if($request->ajax()){
           $preguntas = Pregunta::orderBy('id','ASC')
           ->where('idAsignatura','=',"$asignatura")
           ->get();
           return response()->json($preguntas);

       }
    }

}
