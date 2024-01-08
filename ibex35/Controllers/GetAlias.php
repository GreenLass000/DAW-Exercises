<?php
require_once "connectionBD.php";
$bd = connection();
$query='SELECT * FROM valores';
$arrayActivos=array();
$activos=$bd->query($query);
foreach ($activos as $activo){
    $arrayActivos[]=$activo["alias"];
}
$json=json_encode($arrayActivos);
echo $json;