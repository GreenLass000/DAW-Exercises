<?php
$array = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

foreach ($array as $item) {
    echo $item . "<br>";
}

echo "<br>Borrando algun elemento<br><br>";

unset($array[2]);

foreach ($array as $item) {
    echo $item . "<br>";
}

//echo "<br><a href='index.php'>Menu</a>";