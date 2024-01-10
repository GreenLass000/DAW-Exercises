<?php
require_once "../bootstrap.php";

$institutosRepository = $entityManager->getRepository('Instituto');
$institutos = $institutosRepository->findAll();

foreach ($institutos as $inst) {
    if ($inst) {
        echo sprintf("Instituto: %s\n", $inst->getNombre());
        $profes = $inst->getProfesores();

        foreach ($profes as $profe) {
            echo sprintf(" - %s, %s\n", $profe->getDni(), $profe->getNombre());
        }
    } else {
        echo "Identificador incorrecto";
    }
}