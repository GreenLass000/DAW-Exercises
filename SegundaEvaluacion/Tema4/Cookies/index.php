<?php
if (!isset($_COOKIE["ejemplo"])) { // Caso de no existir
    setcookie("ejemplo", "1", time() + 3600 * 24);
    echo "Bienvenida en el primer acceso.";
} else {// Caso de existir
    $contador = (int)$_COOKIE["ejemplo"];
    $contador++;
    setcookie("ejemplo", $contador, time() + 3600 * 24);
    echo "Bienvenida en el acceso número $contador.";
    echo "<br><a href='pruebaTiempo2.controller'>Borrar Cookie</a>";
}
// ¿Qué significa el “+3” del tiempo? ¿Cómo se puede mejorar?
//¿Cómo se podría borrar la cookie añadiendo un enlace a otra página?