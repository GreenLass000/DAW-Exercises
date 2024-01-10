<?php

require_once "bootstrap.php";
//$element = $entityManager->find("Instituto", "Parquesol");
// No puede borrarse tener profesores con clave foránea apuntando

$element = $entityManager->find("Instituto", "Camino de la Miranda");

if ($element) {
    $entityManager->remove($element);
    $entityManager->flush();

    echo "Instituto borrado";
} else {
    echo "Identificador incorrecto";
}