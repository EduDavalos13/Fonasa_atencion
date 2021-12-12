/**
 * Este escript se encarga de dar funcion a todos los botones implementados en la seccion de atencion,
 * ademas de realizar las consultas a la BD mediante el uso de Ajax
 */

$("#mas_anciano").click(function(e){
    consultarMayor();
});

$("#mayor_riesgo").click(function(e){
    consultarMayorRiesgo();
});

$('#fumadores_urgentes').click(function(e){
    consultarFumadorUrgencia();
});

$('#atender_paciente').click(function(e){
    atenderPaciente();
    consultarDatosPacientesEspera();
    consultarDatosConsulta();
    
});

$('#consulta_mayor').click(function(e){
    consultaMayorPacientes();
})

function consultarDatosConsulta(){
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

consultarDatosConsulta();

function consultarDatosPacientes(){
        
    $('#registros').empty();

    $.getJSON("./php/funciones.php?accion=obtenerDatosPaciente", function (registros){
        
        pacientes = listarDatosPaciente(registros);
        console.log(pacientes);

        $('#registros').append(pacientes.join(""))
        
        //console.log(registros);
    });
}

consultarDatosPacientes();

function consultarDatosPacientesEspera(){
        
    $('#en_espera').empty();

    $.getJSON("./php/funciones.php?accion=obtenerDatosEspera", function (registros){
        
        pacientes = listarDatosPaciente(registros);
        console.log(pacientes);

        $('#en_espera').append(pacientes.join(""))
        
        //console.log(registros);
    });
}

consultarDatosPacientesEspera();

function consultarMayor(){
    
    $('#resultado').empty();
    
    $.getJSON("./php/funciones.php?accion=mas_anciano", function (registros){
        
       
        pacientes = listarDatosPaciente(registros);
        console.log(pacientes);

        $('#resultado').append(pacientes.join(""))


    
    });
}

function consultarMayorRiesgo(){

    historia = prompt("Ingrese N° historia clinica: ");
    $('#resultado').empty();
    $.getJSON("./php/funciones.php?accion=mayor_riesgo" + '&historia='+historia, function (registros){
        console.log(registros)
        

        pacientes = listarDatosPaciente(registros);
        console.log(pacientes);

        $('#resultado').append(pacientes.join(""))


    
    });
}

function consultarFumadorUrgencia(){
    $('#resultado').empty();
    $.getJSON("./php/funciones.php?accion=fumadores_urgencia", function (registros){
        
        pacientes = listarDatosPaciente(registros);
        console.log(pacientes);

        $('#resultado').append(pacientes.join(""))


    
    });
}

function atenderPaciente(){

    $.getJSON("./php/atender_paciente.php", function (registros){
        console.log(registros);
        $('#resultado').empty();

        pacientes = listarDatosPaciente(registros);
        console.log(pacientes);

        $('#resultado').append(pacientes.join(""))

    });
}

function consultaMayorPacientes(){

    $.getJSON("./php/funciones.php?accion=consultaMayorPacientes", function (registros){
        alert("La consulta con mas pacientes es la de: " + registros[0]['nombreEspecialista'] + " con " + registros[0]['cantPacientes']+ " pacientes atendidos");
    });
}

function listarDatosPaciente(registros){
    var pacientes = [];

    $.each(registros, function(llave, valor){
        if(llave >= 0){
            var template = "<tr>";
            
            template += "<td>"+valor.ID+"</td>";
            template += "<td>"+valor.nombre+"</td>";
            template += "<td>"+valor.edad+"</td>";
            template += "<td>"+valor.nroHistoriaClinica+"</td>";
            template += "<td>"+valor.prioridad+"</td>";
            
            template += "</tr>";

            pacientes.push(template);
        }
    });

    return pacientes;
}