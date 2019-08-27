@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Regisro de Calificacion
@endsection


@section('main-content')
<form method="POST" action="{{url('Calificaciones')}}">
                {{csrf_field()}}
    <div class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 style="background-color:#f7f7f7; font-size: 18px; text-align:left; padding: 7px 10px; margin-top: 0;">
                Registro de calificación por Niveles
                            </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
                <div class="box-body">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Asignatura</label>
                            <select name="asignatura" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option value="">Seleccione</option>
                            @foreach($asignaturas as $post)
                                <option value="{{$post['id']}}">{{$post['nombre']}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Estudiante</label>
                            <input id="nombreDeEstudiante" type="text" class="form-control" name="apellido">
                        </div>

                        <div class="form-group" hidden>
                            <label>User</label>
                            <input id="" value = "{{auth()->id()}}" type="text" class="form-control" name="user">
                        </div>


                    </div>
                </div>

                <div class="box-body" id="IA">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Grado</label>
                            <input id="grado" type="text" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label>Curso</label>
                            <input id="curso" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Codigo</label>
                            <input id="codigo" type="text" class="form-control" name="estudiante">
                        </div>


                    </div>
                </div>

        </div>
    </div>
    <div class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 style="background-color:#f7f7f7; font-size: 18px; text-align:left; padding: 7px 10px; margin-top: 0;">
                Registro Calificaciones
                            </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>


                <div class="box-body">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label>Bajo</label>
                            <input type="text" class="form-control" name="bajo">
                        </div>

                        <div class="form-group">
                            <label>Básico</label>
                            <input type="text" class="form-control" name="basico">
                        </div>
                        <div class="form-group">
                            <label>Alto</label>
                            <input type="text" class="form-control" name="alto">
                        </div>
                        <div class="form-group">
                            <label>Superior</label>
                            <input type="text" class="form-control" name="superior">
                        </div>

                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <label for=""></label>
                            <button type="submit" class="btn btn-block btn-danger">Registrar</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</form>
@endsection
