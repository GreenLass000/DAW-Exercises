<?php
require_once "connectionBD.php";
$bd=connection();

$query='SELECT * FROM valores';
$arrayActivos=array();
$activos=$bd->query($query);
foreach ($activos as $activo){
    $arrayActivos[]=[$activo["alias"],$activo["nombre"],$activo["anho"],$activo["valor"],$activo["compradas"]];
}
$json=json_encode($arrayActivos);
echo $json;