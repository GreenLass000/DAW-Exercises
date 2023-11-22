<?php

use dao\Connection;

include_once "../dao/Connection.php";

$credentials = ["root", "", "proyecto"];
$conn = new Connection(...$credentials);
$conn->connect();
echo $conn;
$conn->close();