<?php
$MAX_NUMBER = 14;
$varPar = array();
$var3 = array();

$value = 0;

while ($value <= $MAX_NUMBER) {
    if ($value % 2 == 0) $varPar["par$value"] = $value;
    if ($value % 3 == 0) $var3["tres$value"] = $value;
    $value++;
}

echo '$<b>varPar</b><br>';
print_r($varPar);
echo "<br>";

echo '<b>$var3</b><br>';
print_r($var3);
echo "<br>";

echo "<h2>Par primero</h2>";
$result = $varPar + $var3;
echo '<b>$result</b><br>';
print_r($result);
echo "<br>";
echo "<b>El resultado mide " . sizeof($result) . "</b>";

echo "<h2>3 primero</h2>";
$result = $var3 + $varPar;
echo '<b>$result</b><br>';
print_r($result);
echo "<br>";
echo "<b>El resultado mide " . sizeof($result) . "</b>";
