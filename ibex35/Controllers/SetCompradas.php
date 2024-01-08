<?php
require_once "connectionBD.php";
$bd = connection();
$_post = json_decode(file_get_contents('php://input'), true);
$json = json_encode($_post);

$query= $bd->prepare('UPDATE valores SET compradas=:compradas WHERE alias=:alias');
$datos=$query->execute(array(':alias' => $_post["alias"],':compradas'=>$_post["compradas"]));

echo $json;