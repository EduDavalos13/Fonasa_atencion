<?php
    try{
        $conexion_db = new PDO("mysql:host=localhost;dbname=fonasa" , "root" , "");

    }
    catch(Exception $e){
        echo $e->getMessage();
    }

?>