$("#idAsignatura").change(function(event){

    $.get("listarPreguntas/"+$("#idAsignatura").val()+"",function(response,idAsignatura){
        $("#tablePreguntas").empty();
        $("#tablePreguntas").append( +
            "<thead>"+
            "<tr>"+
            "<th>Preguntas</th>"+
            "<th>Cantidad</th>");

            for (i = 0; i < response.length; i++) {

            $("#tablePreguntas").append(
            "<tr>" +
            "<td><input class='form-control' type='text' name='["+i+"]' value='"+response[i].pregunta+"' readonly></td>"+
            "<td><input tabindex='1' class='form-control' type='text' name='cantidad"+i+"' value='"+" "+"'></td>"+
            "<td><input class='form-control' type='text' value='"+"Estudiantes"+"' readonly></td>"+
            "<td></td>"+
            "</tr>")
        }

    });
});
