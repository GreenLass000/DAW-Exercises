<?php

session_start();
function printHeader($isIndex = false): void
{
    $path = (!$isIndex) ? "../" : "./";
    $cuenta = "";

    if (empty($_SESSION["user"])) {
        $cuenta = "Login";
    } else {
        $cuenta = "Cuenta";
    }

    echo '
    <header>
        <div class="navbar">
            <div class="menu-item">
                <a href="' . $path . "index.php" . '">Inicio</a>
            </div>
            <div class="menu-item">
                <a href="' . $path . "pages/peliculas.php" . '">Peliculas</a>
            </div>
            <div class="menu-item">
                <a href="' . $path . "pages/directores.php" . '">Directores</a>
            </div>
            <div class="menu-item">
                <a href="' . $path . "pages/nuevaPelicula.php" . '">Nueva Película</a>
            </div>
            <div class="menu-item">
                <a href="' . $path . "pages/cuenta.php" . '">' . $cuenta . '</a>
            </div>
        ';

    echo '
        </div>
    </header>
    ';
}