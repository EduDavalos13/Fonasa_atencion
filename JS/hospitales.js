/*
    Consulta los hospitales disponibles en la base de datos, para luego listarlos
    en la pagina principal a modo de login.
*/

function consultarHospital(){
        
    $('#hospitales').empty();

    $.getJSON("./php/funciones.php?accion=obtenerHospitales", function (registros){
        
        var pacientes = [];


        $.each(registros, function(llave, valor){
            if(llave >= 0){
                var template = template + "<option value="+valor.ID+">"+valor.nombre+"</option>";

                pacientes.push(template);
            }
        });

        $('#hospitales').append(pacientes.join(""))
        
        //console.log(registros);
    });
}

consultarHospital();