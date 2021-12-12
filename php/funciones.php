<?php

    /**
     * Este codigo encapsula las funciones implementadas para la seccion de atencion, su ejecucion
     * depende del valor dde la variable accion enviada meiante ajax.
     */

    include "conexion.php";
    $accion = $_GET['accion'];

    switch($accion){
        case "obtenerDatosPaciente":
            $sentenciaSQL = $conexion_db->prepare("SELECT * FROM paciente WHERE hospital = ".$_COOKIE['hospital']);
            $sentenciaSQL->execute();
            $listaPacientes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($listaPacientes);
            break;
        
        case "obtenerDatosEspera":
            $sentenciaSQL = $conexion_db->prepare("SELECT * FROM paciente WHERE estado = 'En espera' AND hospital = ".$_COOKIE['hospital']);
            $sentenciaSQL->execute();
            $listaPacientes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($listaPacientes);
            break;

        case "mas_anciano":
            $sentenciaSQL = $conexion_db->prepare("SELECT * FROM paciente WHERE edad = ( SELECT MAX( edad ) FROM paciente WHERE hospital = ".$_COOKIE['hospital'].") AND hospital = ".$_COOKIE['hospital']);
            $sentenciaSQL->execute();
            $listaPacientes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($listaPacientes);
            break;

        case "mayor_riesgo":
            $historia = $_GET['historia'];

            $sentenciaSQL = $conexion_db->prepare("SELECT * FROM paciente WHERE prioridad >= (SELECT prioridad FROM paciente WHERE nroHistoriaClinica = $historia AND hospital = ".$_COOKIE['hospital'].") AND hospital = ".$_COOKIE['hospital']);
            $sentenciaSQL->execute();
            $listaPacientes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($listaPacientes);
            break;
        
        case "fumadores_urgencia":
            $sentenciaSQL = $conexion_db->prepare("SELECT paciente.ID, paciente.nombre, paciente.edad, paciente.nroHistoriaClinica, paciente.prioridad, pjoven.fumador FROM paciente INNER JOIN pjoven ON pjoven.ID = paciente.ID AND pjoven.fumador = 1 AND paciente.prioridad >= 4 AND paciente.hospital = ".$_COOKIE['hospital']);
            $sentenciaSQL->execute();
            $listaPacientes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($listaPacientes);
            break;
        
        case "consultaMayorPacientes":
            $sentenciaSQL = $conexion_db->prepare("SELECT * FROM consulta WHERE cantPacientes = (SELECT MAX(cantPacientes) FROM consulta WHERE hospital = ".$_COOKIE['hospital'].") AND hospital = ".$_COOKIE['hospital']." LIMIT 1;");
            $sentenciaSQL->execute();
            $listaPacientes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($listaPacientes);
            break;

        case "obtenerDatosConsulta":
            $sentenciaSQL = $conexion_db->prepare("SELECT * FROM consulta WHERE hospital = ".$_COOKIE['hospital']);
            $sentenciaSQL->execute();
            $listaPacientes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($listaPacientes);
            break;
        
        case "obtenerHospitales":
            $sentenciaSQL = $conexion_db->prepare("SELECT * FROM hospital");
            $sentenciaSQL->execute();
            $listaPacientes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($listaPacientes);
    }
?>