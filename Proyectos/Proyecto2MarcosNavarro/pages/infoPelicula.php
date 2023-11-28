<?php
echo "
<html lang='es'>
<head>
<link rel='stylesheet' href='../style/style.css'>
<title>PHPAvanazdo</title>
</head>
<body>";
// ----------------------------------------------------------------

include_once "../dao/select.php";
include_once "../templates/header.php";

printHeader();

$pelicula = getPeliculaById($_GET["id"]);

if (!isset($_GET["id"])) {
    header("Location: peliculas.php");
} elseif ($pelicula->rowCount() === 0) {
    echo "No existe una película con ese id";
    echo "<br><a href='peliculas.php'>Volver a la lista de directores</a>";
} else {
    echo "
    <table>
        <tr>
            <th>Titulo</th>
            <th>Año</th>
            <th>Duración</th>
            <th>Director</th>
        </tr>
    ";

    foreach ($pelicula as $p) {
        echo "
            <tr>
                <td>" . $p["titulo"] . "</td>
                <td>" . $p["año"] . "</td>
                <td>" . $p["duracion"] . "</td>
                <td>" . $p["director"] . "</td>
            </tr>
        ";
    }

    echo "</table>";
}

// ----------------------------------------------------------------
echo "
</body>
</html>
";