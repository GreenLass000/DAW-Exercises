<?php

use Ejercicio1_10\models\Coche;
use Ejercicio1_10\models\Deportivo;
use Ejercicio1_10\models\Familiar;
use Ejercicio1_10\models\Furgoneta;

require_once "models/Deportivo.php";
require_once "models/Familiar.php";
require_once "models/Furgoneta.php";

$fu1 = new Furgoneta(
    "111",
    "blue",
    5,
    5840,
    3.25,
    6,
    500,
    520
);

$fa1 = new Familiar(
    "222",
    "blue",
    5,
    5840,
    3.25,
    6,
    true
);

$d1 = new Deportivo(
    "333",
    "pink",
    2,
    1612,
    2.83,
    6,
    10000,
    5
);

echo $fa1->getMatricula();
echo "<br>\n";
echo Coche::showCont();