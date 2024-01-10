<?php

require_once "../bootstrap.php";

$inst = $entityManager->find("Instituto", "Julián Marías"); //"Parquesol"

if ($inst) {
    echo sprintf("Instituto seleccionado: %s\n", $inst->getNombre());
    $profes = $inst->getProfesores();
    echo "Tipo: " . gettype($profes);

    foreach ($profes as $profe) {
        echo sprintf(" - %s, %s\n", $profe->getDni(), $profe->getNombre());
    }
} else {
    echo "Identificador incorrecto";
}