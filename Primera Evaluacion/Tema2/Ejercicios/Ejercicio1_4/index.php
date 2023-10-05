<?php
$numero = $_GET["number"] ?? 1;
$factorial = 1;

echo "<h2>Factorial</h2>";

for ($i = $numero; $i > 0; $i--) {
    $factorial *= $i;
}

echo "El factorial de $numero es $factorial";

echo "<h2>Area</h2>";

for ($j = 1; $j <= ($_GET["alto"] ?? 8); $j++) {
    for ($k = 2; $k <= ($_GET["ancho"] ?? 5); $k++) {
        $area = $j * $k;
        echo "El area de un rectangulo de base $j y altura $k es <b>$area</b><br>";
    }
    echo "<br>";
}