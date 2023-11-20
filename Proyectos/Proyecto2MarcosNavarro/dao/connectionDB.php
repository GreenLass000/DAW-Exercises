<?php
function connectBD($user, $password, $dbname, $host = "127.0.0.1", $port = 3306): PDO|int
{
    $conn = "mysql:dbname=$dbname;host=$host:$port";
    try {
        return new PDO($conn, $user, $password);
    } catch (PDOException $e) {
        die('Error con la base de datos: ' . $e->getMessage());
    }
}