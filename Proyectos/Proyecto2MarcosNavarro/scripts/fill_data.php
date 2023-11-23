<?php

use models\Connection;
use models\Query;

include_once "../models/Connection.php";
include_once "../models/Query.php";

$credentials = ["root", "", "proyecto"];
$conn = new Connection(...$credentials);
$conn->connect();
$query = new Query($conn);

$sqlCommands = file_get_contents("../sql/data.sql");
$sqlCommandsArray = explode(";", $sqlCommands);

foreach ($sqlCommandsArray as $sqlCommand) {
    if (!empty(trim($sqlCommand))) {
        $query->makeQuery($sqlCommand);
    }
}

echo "Se han añadido los datos correctamente<br>";


$conn->close();