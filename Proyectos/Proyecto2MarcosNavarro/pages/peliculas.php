<?php
echo "
<html lang='es'>
<head>
<link rel='stylesheet' href='../style/style.css'>
<title>PHPAvanzado</title>
</head>
<body>";
// ----------------------------------------------------------------

include_once "../dao/select.php";
include_once "../templates/header.php";
printHeader();

$peliculas = getPeliculas();

echo "
<table>
    <tr>
        <th>Nombre</th>
    </tr>
";

foreach ($peliculas as $pelicula) {
    echo "<tr><td><a href='infoPelicula.php?id=1'>" .
        $pelicula["Titulo"] . "</a></td></tr>";
}

echo "
</table>
";

// ----------------------------------------------------------------
echo "
</body>
</html>
";