<?php
require_once "connectionBD.php";
$bd=connection();
$_post=json_decode(file_get_contents('php://input'),true);
$json=json_encode($_post);
$query=$bd->prepare('UPDATE valores SET valor=:valor WHERE alias=:alias');
$query->execute(array(':valor'=>$_post["valor"],':alias'=>$_post["alias"]));
echo $json;