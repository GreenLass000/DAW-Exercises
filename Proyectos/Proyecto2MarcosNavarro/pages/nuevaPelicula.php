<?php
echo "
<html lang='es'>
<head>
<link rel='stylesheet' href='../style/style.css'>
<title>PHPAvanzado</title>
</head>
<body>";
// ----------------------------------------------------------------

include_once "../templates/header.php";
printHeader();

if (empty($_SESSION["user"])) {
    echo "Debes loguearte para añadir una pelicula";
    echo "<br><a href='login.php?option=0'>Logearse</a>";
} else {
    echo "Nueva pelicula logueado";
}

// ----------------------------------------------------------------
echo "
</body>
</html>
";