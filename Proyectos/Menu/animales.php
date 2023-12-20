<?php

use models\Ave;
use models\Mamifero;

require_once "models/Ave.php";
require_once "models/Mamifero.php";

//Crea un nuevo ave y un nuevo mamifero
$ave1 = new Ave(2, 3);
$mam1 = new Mamifero(6, 5);

include_once "vengode.php";

//Muestra los objetos
echo $ave1;
echo "<br><br>";
echo $mam1;

echo "<br><br><a href='index.controller?page=animales'>Menu</a>";