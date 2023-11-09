<?php
session_start();
if (!isset($_SESSION['cuenta'])) {
    header("Location: sesiones1.php");
}
echo "En sesiones 2: " . $_SESSION["cuenta"];
echo "<br><a href = 'sesion3.php'> Salir <a>";