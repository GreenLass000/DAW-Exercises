<?php
$array = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

include_once "vengode.php";

//Muestra el array
foreach ($array as $item) {
    echo $item . "<br>";
}

echo "<br>Borrando algun elemento<br><br>";

//Borra el elemento en la posicion 3
unset($array[2]);

//Muestra el array con el elemento borrado
foreach ($array as $item) {
    echo $item . "<br>";
}

echo "<br><a href='index.php?page=array'>Menu</a>";