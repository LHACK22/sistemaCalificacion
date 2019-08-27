$(document).ready(function() {

    __estudianteAutocomplete();
    $('#IA').hide();

    });

function __estudianteAutocomplete(){
    var options = {
        url : function(q){
            return  baseUrl('autocompleteEstudiante/findEstudiante?q=' + q);
        },

        getValue: 'nombreCompleto',
        list: {
            onClickEvent: function() {
                var e = $("#nombreDeEstudiante").getSelectedItemData();
                $('#grado').val(e.nombreGrado);
                $('#curso').val(e.nombreSeccion);
                $('#codigo').val(e.id);
                $('#IA').show();
            }
        }
    };
    $("#nombreDeEstudiante").easyAutocomplete(options);
}

$("#btnContinuar").click(function(event){

    $.get("show/"+$('#grado').val()+"/"+$('#seccion').val()+"",function(){
    });
});
