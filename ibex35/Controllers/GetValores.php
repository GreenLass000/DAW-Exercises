<?php
require_once "connectionBD.php";
$bd = connection();
$query = 'SELECT * FROM valores';
$valores = $bd->query($query);
$arrayValores = array();
foreach ($valores as $valor) {
    $arrayValores[] = $valor["valor"];
}
$json=json_encode($arrayValores);
echo $json;