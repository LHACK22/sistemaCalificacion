@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Reporte de Calificacion
@endsection


@section('main-content')
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <script type="text/javascript"> google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Preguntas', 'Seccion A', 'Seccion B', 'Seccion C', 'Seccion D'],
          ['P1',        165,      938,         522,             998],
          ['P2',        165,      938,         522,             998],
          ['P3',        165,      938,         522,             998],
          ['P4',        165,      938,         522,             998],
          ['P5',        165,      938,         522,             998],
          ['P6',        165,      938,         522,             998],
          ['P7',        165,      938,         522,             998],
          ['P8',        135,      1120,        599,             1268],
          ['P9',        157,      1167,        587,             807],
          ['P10',        139,      1110,        615,             968],
          ['P11',        136,      691,         629,             1026],
          ['P12',        165,      938,         522,             998],
          ['P13',        135,      1120,        599,             1268],
          ['P14',        157,      1167,        587,             807],
          ['P14',        139,      1110,        615,             968],
          ['P15',        136,      691,         629,             1026],
          ['P16',        165,      938,         522,             998],
          ['P17',        135,      1120,        599,             1268],
          ['P16',        157,      1167,        587,             807],
          ['P17',        139,      1110,        615,             968],
          ['P18',        136,      691,         629,             1026],
          ['P19',        136,      691,         629,             1026],
          ['P20',        136,      691,         629,             1026],
          ['P10',        139,      1110,        615,             968],
          ['P11',        136,      691,         629,             1026],
          ['P12',        165,      938,         522,             998],
          ['P13',        135,      1120,        599,             1268],
          ['P14',        157,      1167,        587,             807],
          ['P14',        139,      1110,        615,             968],
          ['P15',        136,      691,         629,             1026],
          ['P16',        165,      938,         522,             998],
          ['P17',        135,      1120,        599,             1268],
          ['P16',        157,      1167,        587,             807],
          ['P17',        139,      1110,        615,             968],
          ['P18',        136,      691,         629,             1026],
          ['P19',        136,      691,         629,             1026],
          ['P20',        136,      691,         629,             1026],
        ]);

        var options = {
          title : 'Reporte Grafico de cantidad de respuesta acertada por grado',
        //   vAxis: {title: 'Cups'},
          hAxis: {title: 'Preguntas'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 1100px; height: 500px;"></div>
  </body>
</html>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Pregunta", "Cantidad", { role: "style" } ],
        @foreach($calificacionesPregunta as $p)   
          ["{{$p->pregunta}}", {{$p->cantidad}}, "#33A5FF"],
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








