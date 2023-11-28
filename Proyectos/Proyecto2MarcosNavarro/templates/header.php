<?php

session_start();
function isLogged(): bool
{
    if (!empty($_SESSION["user"])) {
        return true;
    }
    return false;
}

function printHeader($isIndex = false): void
{
    $path = (!$isIndex) ? "../" : "./";

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
            </div>';

    if (!isLogged()) {
        echo '
            <div class="menu-item">
                <a href="' . $path . "pages/nuevaPelicula.php" . '"></a>
            </div>
        ';
    }

    echo '
        </div>
    </header>
    ';
}