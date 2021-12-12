<?php 

    /**
     * Implementacion de la funcion atender cliente, con las codiciones establecidas en el documento.
     */

    include "conexion.php";
    $sentenciaSQL = $conexion_db->prepare("SELECT * FROM paciente WHERE prioridad = (SELECT MAX(prioridad) FROM paciente WHERE hospital =".$_COOKIE['hospital']." AND estado = 'En espera') AND estado = 'En Espera' AND hospital = ".$_COOKIE['hospital']." LIMIT 1;");
    $sentenciaSQL->execute();
    $Pacientes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    //echo json_encode($Pacientes);

    if(empty($Pacientes)){
        $sentenciaSQL = $conexion_db->prepare("SELECT * FROM paciente WHERE prioridad = (SELECT MAX(prioridad) FROM paciente WHERE hospital =".$_COOKIE['hospital']." AND estado = 'Sin atencion') AND estado = 'Sin atencion' AND hospital = ".$_COOKIE['hospital']." LIMIT 1;");
        $sentenciaSQL->execute();
        $Pacientes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        //echo $Pacientes;
    }

    if($Pacientes[0]['prioridad'] >= 5){
        echo "Entro a Urgencia";
        $sentenciaSQL = $conexion_db->prepare("SELECT * FROM consulta WHERE hospital = ".$_COOKIE['hospital']." AND estado = 'Espera' AND tipConsulta = 'Urgencia' LIMIT 1;");
        $sentenciaSQL->execute();
        $Consulta = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

        if($Consulta != null){
            echo "Entro a consultas de urgencia disponibles";
            $sentenciaSQL = $conexion_db->prepare(
                "BEGIN;
                    UPDATE paciente SET estado = 'Atendido' WHERE ID = ".$Pacientes[0]['ID'].";
                    UPDATE consulta SET estado = 'Ocupada', cantPacientes = ".($Consulta[0]['cantPacientes'] + 1)." WHERE ID = ".$Consulta[0]['ID'].";
                COMMIT;");
                $sentenciaSQL->execute();
        }else{
            echo "Entro a sin consultas isponibles";
            $sentenciaSQL = $conexion_db->prepare("UPDATE paciente SET estado = 'En espera' WHERE ID = ".$Pacientes[0]['ID']);
            $sentenciaSQL->execute();
        }
    }

//-----------------HASTA AQUI FUNCIONA---------------------------------------
    
    
    if($Pacientes[0]['prioridad'] <= 4){
        echo "Entro a prioridad 4";
        if($Pacientes[0]['edad'] >= 1 && $Pacientes[0]['edad'] <= 15){
            $sentenciaSQL = $conexion_db->prepare("SELECT * FROM consulta WHERE hospital = ".$_COOKIE['hospital']." AND estado = 'Espera' AND tipConsulta = 'Pediatria' LIMIT 1;");
            $sentenciaSQL->execute();
            $Consulta = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


            if(empty($Consulta)){
                $sentenciaSQL = $conexion_db->prepare("UPDATE paciente SET estado = 'En espera' WHERE ID = ".$Pacientes[0]['ID']);
                $sentenciaSQL->execute();
            }else{
                $sentenciaSQL = $conexion_db->prepare(
                    "BEGIN;
                        UPDATE paciente SET estado = 'Atendido' WHERE ID = ".$Pacientes[0]['ID'].";
                        UPDATE consulta SET estado = 'Ocupada', cantPacientes = ".($Consulta[0]['cantPacientes'] + 1)." WHERE ID = ".$Consulta[0]['ID'].";
                    COMMIT;");
                    $sentenciaSQL->execute();
            }
        }else{
            $sentenciaSQL = $conexion_db->prepare("SELECT * FROM consulta WHERE hospital = ".$_COOKIE['hospital']." AND estado = 'Espera' AND tipConsulta = 'CGI' LIMIT 1;");
            $sentenciaSQL->execute();
            $Consulta = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

            if(empty($Consulta)){
                $sentenciaSQL = $conexion_db->prepare("UPDATE paciente SET estado = 'En espera' WHERE ID = ".$Pacientes[0]['ID']);
                $sentenciaSQL->execute();
            }else{
                $sentenciaSQL = $conexion_db->prepare(
                    "BEGIN;
                        UPDATE paciente SET estado = 'Atendido' WHERE ID = ".$Pacientes[0]['ID'].";
                        UPDATE consulta SET estado = 'Ocupada', cantPacientes = ".($Consulta[0]['cantPacientes'] + 1)." WHERE ID = ".$Consulta[0]['ID'].";
                    COMMIT;");
                    $sentenciaSQL->execute();
            }
        }
    }

?>