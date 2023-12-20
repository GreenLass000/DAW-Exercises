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
                <a href="' . $path . "index.controller" . '">Inicio</a>
            </div>
            <div class="menu-item">
                <a href="' . $path . "pages/peliculas.controller" . '">Peliculas</a>
            </div>
            <div class="menu-item">
                <a href="' . $path . "pages/directores.controller" . '">Directores</a>
            </div>
            <div class="menu-item">
                <a href="' . $path . "pages/nuevaPelicula.controller" . '">Nueva Película</a>
            </div>
            <div class="menu-item">
                <a href="' . $path . "pages/cuenta.controller" . '">' . $cuenta . '</a>
            </div>
        ';

    echo '
        </div>
    </header>
    ';
}