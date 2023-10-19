<?php
$base = $_GET["base"] ?? 5;
$altura = $_GET["altura"] ?? 10;

echo "El area de un rectangulo con base $base y altura $altura es: " . area($base, $altura);

function area($b, $a)
{
    return $b * $a;
}