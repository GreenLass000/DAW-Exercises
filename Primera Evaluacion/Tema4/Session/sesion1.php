<?php
session_start();
if (!isset($_SESSION["cuenta"])) {
    $_SESSION["cuenta"] = 0;
} else {
    $_SESSION["cuenta"]++;
}
echo "En sesiones 1: " . $_SESSION["cuenta"];
echo "<br><a target='_blank' href='sesion2.php'>Sesiones2</a>";