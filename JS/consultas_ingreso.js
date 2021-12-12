/** 
 * Este escript esta oientado a cargar y consultar datos a la BD mediante el uso de Ajax
*/

$('#agregar').click(function (e){
    insert();
});

function insert(){
    var datos = new FormData();
    datos.append('nombre', $('#nombreEspecialista').val());
    datos.append('pacientes', $('#cantPacientes').val());
    datos.append('estado', $('#estado').val());
    datos.append('tipo', $('#tipo').val());

    $.ajax({
        type: "post",
        url: "./php/subirDatosConsulta.php",
        data: datos,
        processData: false,
        contentType: false,

        success: function(res){
            consultarDatos();
        }
    });
}

function consultarDatos(){
    $('#consultas').empty();

    $.getJSON("./php/funciones.php?accion=obtenerDatosConsulta", function (registros){
        
        var pacientes = [];


        $.each(registros, function(llave, valor){
            if(llave >= 0){
                var template = "<tr>";
                
                template += "<td>"+valor.ID+"</td>";
                template += "<td>"+valor.nombreEspecialista+"</td>";
                template += "<td>"+valor.cantPacientes+"</td>";
                template += "<td>"+valor.tipConsulta+"</td>";
                template += "<td>"+valor.estado+"</td>";
                template += "<td>"+valor.hospital+"</td>";
                
                template += "</tr>";

                pacientes.push(template);
            }
        });

        $('#consultas').append(pacientes.join(""))
        
    });
}

consultarDatos();