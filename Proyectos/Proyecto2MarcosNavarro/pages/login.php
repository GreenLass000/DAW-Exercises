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
    <form action="login.controller?option=1" method="post">
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

//if ($option === "0") {
//    echo $login_form;
//    echo "<br><a href='login.controller?option=1'>Acceder sin login</a>";
//} elseif ($option === "1") {
//    $_SESSION["user"] = "";
//    header("Location: ../index.controller");
//} elseif ($option === "2") {

if (!isset($_GET["option"])) {
    echo $login_form;
    if (isset($_GET["error"])) {
        echo "<br>Las credenciales no son correctas";
    }
} else {
    $result = getUser($_POST["user"]);

    if ($result->rowCount() === 1) {
        foreach ($result as $r) {
            $_SESSION["user"] = $r["nombre"];
        }
        header("Location: ../index.controller");
    } else {
        header("Location: login.controller?error=1");
    }
}

//}
//else {
//    $_SESSION["user"] = "";
//    header("Location: ../index.controller");
//}

// ----------------------------------------------------------------
echo "
</body>
</html>
";