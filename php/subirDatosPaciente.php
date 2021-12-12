<?php 

    /**
     * Carga los datos ingresados de los pacientes a la BD, filtrandolos dependiendo del tipo
     * de paciente el cual se esta ingresando, el filtrado se basa en la edad.
     */

    include "conexion.php";
    include "./poo/anciano.php";
    include "./poo/joven.php";
    include "./poo/nino.php";

    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $nroHistoria = $_POST['HistoriaClinica'];
    $dieta = $_POST['dieta'];
    $pesoEstatura = $_POST['pesoEstatura'];
    $fumador = $_POST['fumador'];
    $anhos = $_POST['anhos'];
    $hospital = $_COOKIE['hospital'];

    if($edad >= 41){
        //echo "Entro a Anciano";
        $paciente = new Anciano($nombre, $edad, $nroHistoria, $dieta);
        $prioridad = $paciente->setPrioridad($dieta, $edad);
        echo $prioridad;
        $sentenciaSQL = $conexion_db->prepare(
        "BEGIN;
            INSERT INTO paciente (nombre, edad, nroHistoriaClinica, prioridad, hospital)
                VALUES( :nombre, :edad, :nroHistoria, :prioridad, :hospital);
            INSERT INTO panciano (ID, dieta) 
                VALUES(LAST_INSERT_ID(), :dieta);
        COMMIT;");
        $sentenciaSQL->bindParam(':nombre', $nombre);
        $sentenciaSQL->bindParam(':edad', $edad);
        $sentenciaSQL->bindParam(':nroHistoria', $nroHistoria);
        $sentenciaSQL->bindParam(':prioridad', $prioridad);
        $sentenciaSQL->bindParam(':hospital', $hospital);
        $sentenciaSQL->bindParam(':dieta',$dieta);
    }

    if($edad >= 16 && $edad <= 40){
       //echo "Entro a joven";
        $paciente = new Joven($nombre, $edad, $nroHistoria, $fumador, $anhos);
        $prioridad = $paciente->setPrioridad($fumador, $anhos);
        $sentenciaSQL = $conexion_db->prepare(
        "BEGIN;
            INSERT INTO paciente (nombre, edad, nroHistoriaClinica, prioridad, hospital)
                VALUES( :nombre, :edad, :nroHistoria, :prioridad, :hospital);
            INSERT INTO pjoven (ID, fumador) 
                VALUES(LAST_INSERT_ID(), :fumador);
        COMMIT;");
        $sentenciaSQL->bindParam(':nombre', $nombre);
        $sentenciaSQL->bindParam(':edad', $edad);
        $sentenciaSQL->bindParam(':nroHistoria', $nroHistoria);
        $sentenciaSQL->bindParam(':prioridad', $prioridad);
        $sentenciaSQL->bindParam(':hospital', $hospital);
        $sentenciaSQL->bindParam(':fumador', $fumador);
    }

    if($edad >= 1 && $edad <= 15){
        //echo "Entro a nino";
        $paciente = new Nino($nombre, $edad, $nroHistoria, $pesoEstatura);
        $prioridad = $paciente->setPrioridad($edad, $pesoEstatura);
        $sentenciaSQL = $conexion_db->prepare(
            "BEGIN;
                INSERT INTO paciente (nombre, edad, nroHistoriaClinica, prioridad, hospital)
                    VALUES( :nombre, :edad, :nroHistoria, :prioridad, :hospital);
                INSERT INTO pninno (ID, pesoEstatura) 
                    VALUES(LAST_INSERT_ID(), :pesoEstatura);
            COMMIT;");
            $sentenciaSQL->bindParam(':nombre', $nombre);
            $sentenciaSQL->bindParam(':edad', $edad);
            $sentenciaSQL->bindParam(':nroHistoria', $nroHistoria);
            $sentenciaSQL->bindParam(':prioridad', $prioridad);
            $sentenciaSQL->bindParam(':hospital', $hospital);
            $sentenciaSQL->bindParam(':pesoEstatura', $pesoEstatura);
    }

    $sentenciaSQL->execute();
?>