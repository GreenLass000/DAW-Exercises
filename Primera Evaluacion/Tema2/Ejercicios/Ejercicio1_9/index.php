<?php
require_once "functions.php";

$num1 = $_GET["n1"] ?? 1;
$num2 = $_GET["n2"] ?? 1;

try {
    echo dividir($num1, $num2);
} catch (Error $e) {
    echo "Error: ", $e->getMessage(), "<br>";
}

$nFac = $_GET["fact"] ?? 1;
try {
    $result = factorial($nFac);
    echo "El factorial de $nFac es $result";
} catch (Exception $e) {
    echo "Excepcion: ", $e->getMessage(), "<br>";
}