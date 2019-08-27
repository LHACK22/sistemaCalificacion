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
        ["Element", "Total", { role: "style" } ],
        ["Bajo",{{$bajo}}, "#b87333"],
        ["Basico",{{$basico}}, "silver"],
        ["Alto",{{$alto}}, "gold"],
        ["Superior",{{$superior}}, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Informe de Niveles de la asignatura de {{$nombreAsignatura}} de {{$nombreGrado}} {{$nombreSeccion}}",
        width: 800,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
   <div id="columnchart_values" style="width: 500px; height: 300px;"></div>
                    </div>
@endsection








