<?php 

    /**
     * Carga los datos ingresados de las consultas a la BD, filtrandolos dependiendo del hospital
     * guardado en las cookies
     */

    include "conexion.php";

    $nombre = $_POST['nombre'];
    $pacientes = $_POST['pacientes'];
    $estado = $_POST['estado'];
    $tipo = $_POST['tipo'];
    $hospitales = $_COOKIE['hospital'];

    $sentenciaSQL = $conexion_db->prepare("INSERT INTO consulta (cantPacientes, nombreEspecialista, tipConsulta, estado, hospital) VALUES (:cantPacientes, :nombreEspecialista, :tipConsulta, :estado, :hospital)");
    $sentenciaSQL->bindParam(':nombreEspecialista', $nombre);
    $sentenciaSQL->bindParam(':cantPacientes', $pacientes);
    $sentenciaSQL->bindParam(':tipConsulta', $tipo);
    $sentenciaSQL->bindParam(':estado', $estado);
    $sentenciaSQL->bindParam(':hospital', $hospitales);
    $sentenciaSQL->execute();
?>