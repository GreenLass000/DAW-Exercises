<?php

include_once "vengode.php";

/*
 * Recorre las variables superblobales y las muestra
 */
foreach ($GLOBALS as $key => $value) {
    echo "$key => " . print_r($value, true) . "<br><br>";
}

echo "<br><a href='index.controller?page=superglobals'>Menu</a>";