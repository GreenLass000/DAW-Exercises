<?php
/**
 * Funcion que genera una excepcion si el parametro es menor a 0
 * @param $number
 * @return mixed
 * @throws Exception
 */
function exceptionOk($number)
{
    if ($number < 0)
        throw new Exception("Numero menor a 0");
    return $number;
}

/**
 * Funcion que genera una excepcion si el parametro es menor a 0
 * @param $number2
 * @return mixed
 * @throws Exception
 */
function exceptionError($number2)
{
    if ($number2 < 0)
        throw new Exception("Numero menor a 0");
    return $number2;
}

include_once "vengode.php";

try {
    echo exceptionOk(10);
    echo exceptionError(-2);
} catch (Exception $e) {
    echo "<br><br><span style='color: red'>Error: " . $e->getMessage() . "</span>";
}

echo "<br><br><a href='index.controller?page=exceptions'>Menu</a>";