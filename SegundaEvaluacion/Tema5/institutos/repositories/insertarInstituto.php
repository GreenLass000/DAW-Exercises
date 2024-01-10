<?php

use src\Instituto;

require_once "../bootstrap.php";
$nuevo = new Instituto();
$nuevo->setNombre("Camino de la Miranda");
$nuevo->setCiudad("Palencia");

$entityManager->persist($nuevo);
$entityManager->flush(); //Genera un warning

echo sprintf("Instituto insertado %s de %s\n",
    $nuevo->getNombre(),
    $nuevo->getCiudad());