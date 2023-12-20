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

$director = getDirectorById($_GET["id"]);

if (!isset($_GET["id"])) {
    header("Location: directores.controller");
} elseif ($director->rowCount() === 0) {
    echo "No existe un director con ese id";
    echo "<br><a href='directores.controller'>Volver a la lista de directores</a>";
} else {
    foreach ($director as $d) {
        echo "ID del director: " . $d["id"];
        echo "<br>Nombre del director: " . $d["nombre"];
    }
}

// ----------------------------------------------------------------
echo "
</body>
</html>
";