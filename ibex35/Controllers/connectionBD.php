<?php


//print_r(PDO::getAvailableDrivers());
function connection()
{
    try {
        $conexion = 'mysql:dbname=ibex35;host=127.0.0.1';
        $usuario = 'root';
        $clave = '';
        $bd = new PDO($conexion, $usuario, $clave);
        //echo "Conexion establecida<br>";
        return $bd;
    } catch (PDOException $e) {
        echo "Error en la conexion:" . $e->getMessage();
    }
}
