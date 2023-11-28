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

$login_form = '
<fieldset>
    <legend>Formulario de Login</legend>
    <form action="login.php?option=2" method="post">
        <label for="user">Usuario</label><br>
        <input type="text" id="user" name="user"><br><br>
        <label for="pass">Contraseña</label><br>
        <input type="password" id="pass" name="pass"><br><br>
        <input type="submit" value="Login">
    </form>
</fieldset>
';

printHeader();

$option = $_GET["option"] ?? "0";

if ($option === "0") {
    echo $login_form;
    echo "<br><a href='login.php?option=1'>Acceder sin login</a>";
} elseif ($option === "1") {
    $_SESSION["user"] = "";
    header("Location: ../index.php");
} elseif ($option === "2") {

    $result = getUser($_POST["user"]);

    if ($result->rowCount() === 1) {
        foreach ($result as $r) {
            $_SESSION["user"] = $r["nombre"];
        }
        header("Location: ../index.php");
    } else {
        header("Location: login.php");
    }
} else {
    $_SESSION["user"] = "";
    header("Location: ../index.php");
}

// ----------------------------------------------------------------
echo "
</body>
</html>
";