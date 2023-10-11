<?php
function dividir($n1, $n2)
{
    if ($n1 == 0 || $n2 == 0)
        throw new Error("Parametro no puede ser 0");
    return $n1 / $n2;
}

function factorial($number)
{
    if ($number <= 0)
        throw new Exception("El numero tiene que ser mayor a 0");

    $factorial = 1;
    for ($i = $number; $i > 0; $i--) {
        $factorial *= $i;
    }
    return $factorial;
}