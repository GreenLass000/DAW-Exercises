<?php
require_once "connectionBD.php";
$bd = connection();

$query = 'SELECT * FROM valores';
$compradas = $bd->query($query);
$arrayCompradas = array();
foreach ($compradas as $comprada) {
    $arrayCompradas[] = $comprada["compradas"];
}
$json=json_encode($arrayCompradas);
echo $json;
