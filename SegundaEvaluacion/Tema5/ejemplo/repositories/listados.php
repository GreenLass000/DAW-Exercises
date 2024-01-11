<?php // Fichero listarEstudiantes.php

require_once "../bootstrap.php";

$listaProvincias = $entityManager->getRepository('Provincia');
$provincias = $listaProvincias->findAll();
$cont = 1;

foreach ($provincias as $provincia) {
    echo sprintf($cont++ . " - Provincia %s, %s km2\n",
        $provincia->getNombre(), $provincia->getExtension());
}

$listaCasas = $entityManager->getRepository('Casa');
$casas = $listaCasas->findAll();
$cont = 1;

foreach ($casas as $casa) {
    echo sprintf($cont++ . " - Casa con id %s, de %s\n",
        $casa->getId(), $casa->getProvincia()->getNombre());
}

$listaPersonas = $entityManager->getRepository('Persona');
$personas = $listaPersonas->findAll();
$cont = 1;

foreach ($personas as $persona) {
    echo sprintf($cont++ . " - Persona con dni %s, %s en %s\n",
        $persona->getDni(),
        $persona->getCasa()->getId(),
        $persona->getCasa()->getProvincia()->getNombre());
}