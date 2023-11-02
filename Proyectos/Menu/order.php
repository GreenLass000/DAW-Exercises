<?php

include_once "vengode.php";

$array = ["Marcos", "Daniel", "Luis", "Paula", "Alejandro"];

//Muestra el array no ordenado
echo "Array no ordenado: ";
print_r($array);
echo "<br><br>";

// Ordena y muestra el array
asort($array);
echo "Array ordenado: ";
print_r($array);
echo "<br><br>";

echo "<a href='index.html?page=order'>Menu</a>";