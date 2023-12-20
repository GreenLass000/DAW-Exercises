<?php
echo "
<html lang='es'>
<head>
<link rel='stylesheet' href='../style/style.css'>
<title>PHPAvanazdo</title>
</head>
<body>";
// ----------------------------------------------------------------

include_once "../templates/header.php";
printHeader();

if (empty($_SESSION["user"])) {
    header("Location: login.controller");
} else {
    echo "<br><a href='cuenta.controller?logout=1'>Logout</a>";
    echo "<br>Eres " . $_SESSION["user"];
    echo "<br><h3>Ultima valoracion: </h3>";

    if (isset($_COOKIE[$_SESSION["user"]])) {
        $data = explode("#", $_COOKIE[$_SESSION["user"]]);
        echo "Nota: " . $data[0];
        echo "<br>Comentario: " . $data[1];
    } else {
        echo "Aun no has valorado ninguna pelicula";
    }
}

if (isset($_GET["logout"])) {
    session_destroy();
    setcookie(session_name(), "", time() - 1);
    header("Location: ../index.controller");
}

// ----------------------------------------------------------------
echo "
</body>
</html>
";