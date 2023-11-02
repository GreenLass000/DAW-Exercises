<?php
/**
 * Muestra las funciones de variable por defecto
 * @param $variable
 * @return void
 */
function defaultVariableFunctions($variable)
{
    echo "is_null<br>";
    echo is_null($variable) . "<br>";
    echo "isset<br>";
    echo isset($variable) . "<br>";
    echo "empty<br>";
    echo empty($variable) . "<br>";
    echo "unset<br>";
    //echo unset($variable) . "<br>";
    echo "isint<br>";
    echo is_int($variable) . "<br>";
    echo "floatval<br>";
    echo floatval($variable) . "<br>";
    echo "print_r<br>";
    echo print_r($variable) . "<br>";
    echo "var_dump<br>";
    echo var_dump($variable) . "<br>";
}

/**
 * Muestra las funciones de cadena por defecto
 * @param $variable
 * @return void
 */
function defaultStrFunctions($variable)
{
    echo "strlen<br>";
    echo strlen($variable) . "<br>";
    echo "explode<br>";
    echo var_dump(explode(" ", $variable)) . "<br>";
    echo "implode<br>";
    echo implode("", array($variable, "end")) . "<br>";
    echo "strcmp<br>";
    echo strcmp($variable, "Hola") . "<br>";
    echo "strtolower<br>";
    echo strtolower($variable) . "<br>";
    echo "strtoupper<br>";
    echo strtoupper($variable) . "<br>";
    echo "strstr<br>";
    echo strstr($variable, "la") . "<br>";
}

/**
 * Muestra las funciones de los array por defecto
 * @param $arr
 * @return void
 */
function defaultArrayFunctions($arr)
{
    echo "var_dump<br>";
    echo ksort($arr) . "<br>";
    echo "var_dump<br>";
    echo krsort($arr) . "<br>";
    echo "var_dump<br>";
    echo sort($arr) . "<br>";
    echo "var_dump<br>";
    echo rsort($arr) . "<br>";
    echo "var_dump<br>";
    echo asort($arr) . "<br>";
    echo "var_dump<br>";
    echo arsort($arr) . "<br>";
    echo "var_dump<br>";
    echo var_dump(array_values($arr)) . "<br>";
    echo "var_dump<br>";
    echo var_dump(array_keys($arr)) . "<br>";
    echo "var_dump<br>";
    echo array_key_exists("v1", $arr) . "<br>";
    echo "var_dump<br>";
    echo count($arr) . "<br>";
}

$var = 1;
$varStr = "Hola";
$varArr = array("v1" => "Hola", "Adios");

include_once "vengode.php";

echo "<h2>Funciones de variable</h2>";
defaultVariableFunctions($var);
echo "<h2>Funciones de cadena</h2>";
defaultStrFunctions($varStr);
echo "<h2>Funciones de array</h2>";
defaultArrayFunctions($varArr);

echo "<br><br><a href='index.html?page=functions'>Menu</a>";