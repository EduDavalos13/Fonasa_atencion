/** 
 * Este escript esta oientado a cargar y consultar datos a la BD mediante el uso de Ajax
*/
     $('#agregar').click(function (e){
        insert();
    });

    function insert(){
        var datos = new FormData();
        datos.append('nombre', $('#nombrePaciente').val());
        datos.append('edad', $('#edadPaciente').val());
        datos.append('HistoriaClinica', $('#nroHistoriaClinica').val());
        datos.append('dieta', $('#dieta').val());
        datos.append('pesoEstatura', $('#pesoEstatura').val());
        datos.append('fumador', $('#fumador').val());
        datos.append('anhos', $('#anhos').val());

        $.ajax({
            type: "post",
            url: "./php/subirDatosPaciente.php",
            data: datos,
            processData: false,
            contentType: false,

            success: function(res){
                console.log(res);
                consultarDatos();
            }
        });
    }

    function consultarDatos(){
        
        $('#registros').empty();

        $.getJSON("./php/funciones.php?accion=obtenerDatosPaciente", function (registros){
            
            var pacientes = [];
            console.log(registros);
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

            $('#registros').append(pacientes.join(""))
            
        });
    }

    consultarDatos();