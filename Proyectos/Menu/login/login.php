<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php
require_once "loginFunctions.php";
if (is_null($_POST["user"] ?? null) || is_null($_POST["pass"] ?? null)) {
    login();
} else {
    loginCheck();
}

echo "<br><br><a href='../index.controller?page=login'>Menu</a>";
?>

</body>
</html>