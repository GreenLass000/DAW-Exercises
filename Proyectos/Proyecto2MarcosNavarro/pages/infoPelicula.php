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
include_once "../dao/insert.php";
include_once "../templates/header.php";

printHeader();

$pelicula = getPeliculaById($_GET["id"]);

$username = $_SESSION["user"];
$id = $_GET["id"];

if (!isset($_GET["id"])) {
    header("Location: peliculas.controller");
} elseif ($pelicula->rowCount() === 0) {
    echo "No existe una película con ese id";
    echo "<br><a href='peliculas.controller'>Volver a la lista de películas</a>";
} else {

    if (isset($_GET["option"])) {
        foreach ($pelicula as $p) {
            $idu = getUser($username);
            foreach ($idu as $u) {
                $idu = $u["id"];
            }

            $com = "";
            if ($_POST["comment"] === "") {
                $com = "Comentario por defecto";
            }

            $data = [
                "idu" => $idu,
                "idp" => $p["id"],
                "nota" => $_POST["nota"],
                "com" => $com
            ];
            $insert = postValoration($data);

            setcookie($_SESSION["user"],
                $data["nota"] . "#" . $data["com"],
                time() + 3600 * 24 * 365 * 1000);

            if ($insert === 0) {
                echo "Nueva valoracion publicada";
            } else {
                echo "Error al publicar";
            }
        }
        header("Location: infoPelicula.controller?id='" . $id . "'");
    }

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

    $newvaloration = '
        <div>
            <fieldset>
                <legend>Nueva valoración</legend>
                <form action="infoPelicula.controller?id=' . $id . '&option=0" method="post">
                    <textarea name="comment" id="comment" rows="10" placeholder="Escribe tu comentario aqui"></textarea><br>
                    <p class="clasificacion">
                        nóicautnuP <br>
                    
                        <input id="radio1" type="radio" name="nota" value="5">
                        <label class="labelStar" for="radio1">★</label>
                        
                        <input id="radio2" type="radio" name="nota" value="4">
                        <label class="labelStar" for="radio2">★</label>
                        
                        <input id="radio3" type="radio" name="nota" value="3">
                        <label class="labelStar" for="radio3">★</label>
                        
                        <input id="radio4" type="radio" name="nota" value="2">
                        <label class="labelStar" for="radio4">★</label>
                        
                        <input id="radio5" type="radio" name="nota" value="1" checked>
                        <label class="labelStar" for="radio5">★</label>
                    </p>
                    <input type="submit" value="Publicar">
                </form>
            </fieldset>
        </div>
    ';

    if (!empty($_SESSION["user"])) {
        echo $newvaloration;
    }

    $listavaloraciones = getValorations($_GET["id"]);
    echo "<h3>Valoraciones</h3>";

    foreach ($listavaloraciones as $valoration) {
        echo "==============================";
        echo "<br>Usuario: ";
        echo $valoration["usuario"];
        echo "<br>Nota: ";
        echo $valoration["nota"];
        echo "<br>Comentario: ";
        echo $valoration["comentario"];
        echo "<br>==============================";
    }
}

// ----------------------------------------------------------------
echo "
            </body >
</html >
    ";