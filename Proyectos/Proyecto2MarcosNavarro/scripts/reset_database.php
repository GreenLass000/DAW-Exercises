<?php

use models\Connection;
use models\Query;

include_once "../models/Connection.php";
include_once "../models/Query.php";

$credentials = ["root", "", ""];
$conn = new Connection(...$credentials);
$conn->connect();
$query = new Query($conn);

$sqlCommands = file_get_contents("../sql/reset.sql");
$sqlCommandsArray = explode(";", $sqlCommands);

foreach ($sqlCommandsArray as $sqlCommand) {
    if (!empty(trim($sqlCommand))) {
        $query->makeQuery($sqlCommand);
    }
}

echo "Se ha reiniciado la base de datos correctamente<br>";
echo "<a href='create_tables.controller'>Crear las tablas</a>";


$conn->close();