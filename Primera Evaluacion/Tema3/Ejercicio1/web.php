<?php
if (isset($_POST["nombre"]) && count($_POST) < 3) {
    $nombre = $_POST["nombre"];
    echo "Hola $nombre";
} elseif (isset($_POST["base"]) && isset($_POST["altura"])) {
    $area = $_POST["base"] * $_POST["altura"];
    echo "El area es $area";
} elseif (isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["edad"])) {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    echo "Eres $nombre $apellidos y tienes $edad";
}