<?php
$array = ["Marcos", "Daniel", "Luis", "Paula", "Alejandro"];
echo "Array no ordenado: ";
print_r($array);
echo "<br><br>";

asort($array);
echo "Array ordenado: ";
print_r($array);
echo "<br><br>";

echo "<a href='../index.php'>Menu</a>";