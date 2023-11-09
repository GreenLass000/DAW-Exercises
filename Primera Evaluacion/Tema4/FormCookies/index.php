<?php
$colorForm = "
<form action='sesion1.php' method='post'>
    Rojo <input type='radio' name='color' value='red' id='' checked><br>
    Amarillo <input type='radio' name='color' value='yellow' id=''><br>
    <input type='submit' value='Enviar'>
</form>";

if (!isset($_COOKIE["color"])) {
    if (isset($_POST["color"])) {
        setcookie("color", $_POST["color"], time() + 10);
        header("Location:sesion1.php");
    } else {
        echo $colorForm;
    }
} else {
    if (isset($_POST["color"])) {
        setcookie("color", $_POST["color"], time() + 10);
        header("Location:sesion1.php");
    } else {
        echo "<h1 style='color: " . $_COOKIE["color"] . "'>Título</h1>";
        echo $colorForm;
    }
}