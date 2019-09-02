@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Reporte de Calificacion
@endsection

@section('main-content')
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Preguntasa adf", "Cantidad de Estudiantes {{$nA}} - Porcentaje", { role: "style" } ],
        @foreach($calificacionesPregunta as $p)   
          <?php 
            $porcentaje = ($p->cantidad * 100) / $nA;
            $porcentaje = bcdiv($porcentaje, '1', 0);
          ?>
          ["{{$p->pregunta}}", {{$porcentaje}}, "#34A5FF"],
        @endforeach        
     ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Informe preguntas acertadas de la asignatura de {{$nombreAsignatura}} de {{$nombreGrado}} {{$nombreSeccion}}",
        width: 1200,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
@endsection










