<?php
function exceptionOk($number)
{
    if ($number < 0)
        throw new Exception("Numero menor a 0");
    return $number;
}

function exceptionError($number2)
{
    if ($number2 < 0)
        throw new Exception("Numero menor a 0");
    return $number2;
}

try {
    echo exceptionOk(10);
    echo exceptionError(-2);
} catch (Exception $e) {
    echo "<br><br><span style='color: red'>Error: " . $e->getMessage() . "</span>";
}

//echo "<br><br><a href='index.php'>Menu</a>";