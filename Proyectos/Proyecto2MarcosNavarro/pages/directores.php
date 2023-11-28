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

$directores = getDirectors();

echo "
<table>
    <tr>
        <th>Nombre</th>
    </tr>
";

foreach ($directores as $director) {
    echo "<tr><td><a href='infoDirector.php?id=" . $director["id"] . "'>" .
        $director["nombre"] . "</a></td></tr>";
}

echo "
</table>
";

// ----------------------------------------------------------------
echo "
</body>
</html>
";