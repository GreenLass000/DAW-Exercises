<?php
$thispage = htmlspecialchars($_SERVER["PHP_SELF"]);

function genForm(): string
{
    global $thispage;
    $name = (isset($_POST["user"])) ? $_POST["user"] : "";
    return "
        <form action='" . $thispage . "' method='post'>
            Usuario: <input type='text' name='user' value='" . $name . "'><br>
            Contraseña: <input type='password' name='pass'><br>
            <input type='submit' value='Enviar'>
        </form>
    ";
}

function fileForm(): string
{
    global $thispage;
    return "
        <form action='" . $thispage . "' method='post' enctype='multipart/form-data'>
            <input type='resources' name='resources'><br>
            <input type='submit' value='Subir'>
        </form>
    ";
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo genForm();
} else {
    $user = $_POST["user"] ?? null;
    $pass = $_POST["pass"] ?? null;

    if ($user === null || $pass === null) {
        echo genForm();
        echo "Introduce usuario o contraseña";
    } elseif ($user === "user" && $pass === "1234") {
        if (empty($_FILES)) {
            echo fileForm();
        } else {

        }
    } else {
        echo genForm();
        echo "<span style='color: red'>Usuario o contraseña incorrectos</span>";
    }
}