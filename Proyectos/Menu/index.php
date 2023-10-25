<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<?php
if (isset($_GET["page"])) {
    include_once "vengode.php";
}
?>

<a href="login/login.php?page=menu">LOGIN</a><br>
<a href="array.php?page=menu">ARRAY</a><br>
<a href="order.php?page=menu">ORDER</a><br>
<a href="area.php?page=menu">AREA</a><br>
<a href="functions.php?page=menu">FUNCTIONS</a><br>
<a href="superglobals.php?page=menu">SUPERGLOBALS</a><br>
<a href="exceptions.php?page=menu">EXCEPTIONS</a><br>
<a href="animales.php?page=menu">ANIMALES</a><br>

</body>
</html>
