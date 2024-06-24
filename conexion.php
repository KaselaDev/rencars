<?php
    $user="root";
    $psw="";
    $dbname="alquicars";
    $host="localhost";

    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $conexion = new PDO($dsn, $user, $psw);
        echo '<script>console.log("El servidor esta conectado a la base de datos correctamente");</script>';
    } catch (PDOException $e) {
        echo '<script>console.log("El servidor no se pudo conectar con la base de datos");</script>';
    }
?>