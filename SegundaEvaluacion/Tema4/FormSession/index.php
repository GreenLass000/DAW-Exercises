<?php
$self = htmlspecialchars($_SERVER["PHP_SELF"]);
$colorForm = "
<form action='$self' method='post'>
    Rojo <input type='radio' name='color' value='red' id='' checked><br>
    Amarillo <input type='radio' name='color' value='yellow' id=''><br>
    <input type='submit' value='Enviar'>
</form>";
session_start();
if (!isset($_SESSION["color"])) {
    if (isset($_POST["color"])) {
        $_SESSION["color"] = $_POST["color"];
        header("Location:index.controller");
    } else {
        echo $colorForm;
    }
} else {
    if (isset($_POST["color"])) {
        $_SESSION["color"] = $_POST["color"];
        header("Location:index.controller");
    } else {
        echo "<h1 style='color: " . $_SESSION["color"] . "'>Título</h1>";
        echo $colorForm;
    }
}

