<?php
$base = $_GET["b"] ?? false;
$altura = $_GET["a"] ?? false;

if ($base && $altura) {
    echo "El area de un rectangulo con base $base y altura $altura es " . area($base, $altura);
} else {
    echo "No se ha especificado base y altura";
}

function area($b, $a)
{
    return $b * $a;
}