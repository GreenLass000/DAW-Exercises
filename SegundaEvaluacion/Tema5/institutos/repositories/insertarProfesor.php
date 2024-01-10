<?php

use src\Profesor;

require_once "../bootstrap.php";

$nuevo = new Profesor();
$nuevo->setDni("6G");
$nuevo->setNombre("Filemón Fernández");
//$nuevo->setCentro("Parquesol"); //Da error, se necesita un objeto, no un string

$centro = $entityManager->find("Instituto", "Parquesol");

$nuevo->setCentro($centro);

$entityManager->persist($nuevo);
$entityManager->flush();

echo sprintf("Profesor insertado %s\n", $nuevo->getNombre());