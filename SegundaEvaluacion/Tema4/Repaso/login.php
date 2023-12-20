<?php

use ConnectorLib\Connection;
use ConnectorLib\Query;

require_once "Connection.php";
require_once "Query.php";

session_start();

$conn = new Connection("root", "", "productosjson");
$query = new Query($conn);

$user = $_POST["usuario"];
$clave = $_POST["clave"];

$sql = "SELECT * FROM usuarios WHERE nombre='$user' AND clave='$clave'";
$result = $query->makeQuery($sql);

$arr = [$result];

$_SESSION["user"] = $user;

echo json_encode($arr);