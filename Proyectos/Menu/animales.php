<?php

use models\Ave;
use models\Mamifero;

require_once "models/Ave.php";
require_once "models/Mamifero.php";

$ave1 = new Ave(2, 3);
$mam1 = new Mamifero(6, 5);

echo $ave1;
echo "<br><br>";
echo $mam1;

//echo "<br><br><a href='index.php'>Menu</a>";