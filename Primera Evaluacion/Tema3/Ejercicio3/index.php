<?php
$nom = $_GET["n"] ?? false;
$ap = $_GET["a"] ?? false;
$edad = $_GET["e"] ?? false;

if ($nom && $ap && $edad) {
    echo "Eres $nom $ap y tienes $edad años";
} else {
    echo "No se ha especificado nombre, apellido y edad";
}