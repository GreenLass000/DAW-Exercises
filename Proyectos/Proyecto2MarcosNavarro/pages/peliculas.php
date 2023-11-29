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
<table border='1'>
    <tr>
        <th>Nombre</th>
        <th>Nota media</th>
    </tr>
";

foreach ($peliculas as $pelicula) {
    echo "
        <tr>
            <td><a href='infoPelicula.php?id=1'>" . $pelicula["titulo"] . "</a></td>
            <td>" . round($pelicula["media"], 1) . "/5</td>
        </tr>
    ";
}

echo "
</table>
";

// ----------------------------------------------------------------
echo "
</body>
</html>
";