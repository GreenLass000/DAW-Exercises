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
    <table border='1'>
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

    $username = $_SESSION["user"];
    $id = $_GET["id"];

    $newvaloration = '
<div>
    <fieldset>
        <legend>Nueva valoración</legend>
        <form action="infoPelicula.php?id=' . $id . '" method="post">
            <textarea name="comment" id="comment" rows="10" placeholder="Escribe tu comentario aqui"></textarea><br>
            <p class="clasificacion">
                nóicautnuP <br>
            
                <input id="radio1" type="radio" name="estrellas" value="5">
                <label for="radio1">★</label>
                
                <input id="radio2" type="radio" name="estrellas" value="4">
                <label for="radio2">★</label>
                
                <input id="radio3" type="radio" name="estrellas" value="3">
                <label for="radio3">★</label>
                
                <input id="radio4" type="radio" name="estrellas" value="2">
                <label for="radio4">★</label>
                
                <input id="radio5" type="radio" name="estrellas" value="1">
                <label for="radio5">★</label>
            </p>
            <input type="submit" value="Publicar">
        </form>
    </fieldset>
</div>
';
    if (!empty($_SESSION["user"])) {
        echo $newvaloration;
    }
}

// ----------------------------------------------------------------
echo "
</body>
</html>
";