<?php
$nombre = $_GET["nombre"] ?? false;

if ($nombre) {
    echo "Tu nombre es $nombre";
} else {
    echo "Aun no has introducido ningun nombre";
}