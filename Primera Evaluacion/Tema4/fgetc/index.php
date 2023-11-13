<?php $fich = fopen("./fichero.txt", "r+");
if ($fich === False) {
    echo "No se encuentra el fichero o no se pudo leer<br>";
} else {
    echo "Se procede a leer el fichero: ";
    while (!feof($fich)) {
        $car = fgetc($fich);
        echo $car;
    }
}
fclose($fich);