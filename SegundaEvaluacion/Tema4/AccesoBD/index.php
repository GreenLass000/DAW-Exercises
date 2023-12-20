<?php

include_once "dao/dao.php";

$self = htmlspecialchars($_SERVER["PHP_SELF"]);
$form = "
<form action='$self' method='post'>
    DNI: <input type='text' value='dni'><br>
    Nombre: <input type='text' value='name'><br>
    Apellidos: <input type='text' value='surname'><br>
    Fecha: <input type='date' value='date'><br>
</form>
";