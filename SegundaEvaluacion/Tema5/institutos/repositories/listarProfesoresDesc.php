<?php

require_once "../bootstrap.php";

$profesorRepository = $entityManager->getRepository('Profesor');
$profesores = $profesorRepository->findBy([], ['dni' => 'DESC']);
$cont = 1;

foreach ($profesores as $profe) {
    echo sprintf($cont++ . "- %s, %s\n", $profe->getDni(), $profe->getNombre());
}