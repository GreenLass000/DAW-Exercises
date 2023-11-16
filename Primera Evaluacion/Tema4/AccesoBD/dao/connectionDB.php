<?php
function connectBD($user, $password, $dbname, $host = "127.0.0.1", $port = 3306): PDO|int
{
    $conn = "mysql:dbname=$dbname;host=$host:$port";
//    print_r(PDO::getAvailableDrivers());
    try {
        $bd = new PDO($conn, $user, $password);
        echo "Se ha conectado a la base de datos.\n<br>";
        return $bd;
    } catch (PDOException $e) {
        echo 'Error con la base de datos: ' . $e->getMessage();
        die();
    }
}