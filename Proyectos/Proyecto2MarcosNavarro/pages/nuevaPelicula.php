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
include_once "../dao/insert.php";
include_once "../templates/header.php";
printHeader();

if (empty($_SESSION["user"])) {
    echo "Debes loguearte para añadir una pelicula";
} else {

    $form = '
    <form method="post" action="nuevaPelicula.controller?insert=1">
        <label for="title">Titulo</label><br>
        <input type="text" id="title" name="title" required><br>
        
        <label for="ano">Año</label><br>
        <input type="number" id="ano" name="ano" min="1990" value="2023" required><br>
        
        <label for="long">Duración</label><br>
        <input type="number" id="long" name="long" min="61" required><br>
        
        <select name="director">
        ';

    $directores = getDirectors();
    foreach ($directores as $director) {
        $form .= "<option value='" . $director["id"] . "'>" . $director["nombre"] . "</option>";
    }

    $form .= '
        </select>
        <br><input type="submit" value="Añadir">
    </form>
    ';

    echo $form;

    if (isset($_GET["insert"])) {

        $data = [
            "tit" => $_POST["title"],
            "ano" => $_POST["ano"],
            "dur" => $_POST["long"],
            "dit" => $_POST["director"]
        ];
        $result = postPelicula($data);

        header("Location: ../index.controller");
    }
}

// ----------------------------------------------------------------
echo "
</body>
</html>
";