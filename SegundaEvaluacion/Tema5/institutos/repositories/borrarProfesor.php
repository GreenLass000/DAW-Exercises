<?php

require_once "../bootstrap.php";

$element = $entityManager->find("Profesor", "5E");

if ($element) {
    $entityManager->remove($element);
    $entityManager->flush();
    
    echo "Profesor borrado";
} else {
    echo "Identificador incorrecto";
}