<?php

require_once "../bootstrap.php";

$profesorRepository = $entityManager->getRepository('Profesor');
$profesores = $profesorRepository->findAll();
$cont = 1;

foreach ($profesores as $profe) {
    $inst = $profe->getCentro();
    echo sprintf($cont++ . "- %s, %s, %s, %s\n", $profe->getDni(), $profe->getNombre(), $inst->getNombre(), $inst->getCiudad());
}