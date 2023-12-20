<?php
//Recoge del get los parametros, si no existen asigna unos por defecto
$base = $_GET["base"] ?? 5;
$altura = $_GET["altura"] ?? 10;

include_once "vengode.php";

//Muestra el area
echo "El area de un rectangulo con base $base y altura $altura es: " . area($base, $altura);
echo "<br><br><a href='index.controller?page=area'>Menu</a>";

/**
 * Calcula el area usando base y altura
 * @param $b
 * @param $a
 * @return float|int
 */
function area($b, $a)
{
    return $b * $a;
}