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
    </tr>
";

foreach ($peliculas as $pelicula) {
    echo "
        <tr>
            <td>
                <a href='infoPelicula.controller?id=" . $pelicula["id"] . "'>
                    " . $pelicula["titulo"] . "
                </a>
            </td>
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