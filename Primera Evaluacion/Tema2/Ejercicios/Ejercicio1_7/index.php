<?php
echo "<h2>Ecuacion segundo grado</h2>";

$a = 1;
$b = 2;
$c = 3;
$results = array();

$x = (-$b + sqrt($b ** 2 - (4 * $a * $c))) / (2 * $a);
$results[] = $x;
$x = (-$b - sqrt($b ** 2 - (4 * $a * $c))) / (2 * $a);
$results[] = $x;

print_r($results);

echo "<h2>Array de enteros</h2>";
$array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
$nuevoArray = array();
$numero = 5;

foreach ($array as $number) {
    if ($number > $numero) $nuevoArray[] = $number;
}

print_r($nuevoArray);

echo "<h2>Letras A</h2>";

// echo "Escribe una frase ";
$cadena = readline("Escribe una frase: ");
// echo "I got it:\n" . $input;

// $cadena = "Hola me llamo Marcos y estoy en segundo de desarrollo de aplicaciones web";
$contador = 0;

for ($i = 0; $i < strlen($cadena); $i++) {
    if ($cadena[$i] === "a") $contador++;
}

echo "La cadena tenía $contador a";
