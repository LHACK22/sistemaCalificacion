@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Reporte de Calificacion
@endsection


@section('main-content')
<form method="POST" action="{{url('showPregunta')}}">
                {{csrf_field()}}
    <div class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 style="background-color:#f7f7f7; font-size: 18px; text-align:left; padding: 7px 10px; margin-top: 0;">
                Informe Calificaciones por Preguntas
                            </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
                <div class="box-body">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Grado</label>
                            <select id="grado" name="grado" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" required="">
                            <option value="">Seleccione</option>
                            @foreach($grados as $post)
                                <option value="{{$post['id']}}">{{$post['nombre']}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Curso</label>
                            <select id="seccion" name="seccion" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option value="">Seleccione</option>
                            @foreach($seccions as $post)
                                <option value="{{$post['id']}}">{{$post['nombre']}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Asignatura</label>
                            <select id="seccion" name="asignatura" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" required="">
                            <option value="">Seleccione</option>
                            @foreach($asignaturas as $post)
                                <option value="{{$post['id']}}">{{$post['nombre']}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <label for=""></label>
                            <button id ="btnContinuar" type="submit" class="btn btn-block btn-danger">Continuar</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</form>
@endsection
