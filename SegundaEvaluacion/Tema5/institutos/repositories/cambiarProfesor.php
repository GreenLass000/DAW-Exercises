<?php

require_once "../bootstrap.php";

$element = $entityManager->find("Profesor", "4D");

if ($element) {
    $centro = $entityManager->find("Instituto", "Parquesol");
    $element->setCentro($centro);
    $entityManager->flush();

    echo "Profesor actualizado";
} else {
    echo "Identificador incorrecto";
}