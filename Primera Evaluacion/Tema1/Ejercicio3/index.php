<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    $n1 = 13;
    $n2 = 4;
    $resultado = 0;
    ?>
</head>

<body>
    <?php
    $resultado = $n1 + $n2;
    echo "La suma es $resultado ";
    echo "<br>";

    $resultado = $n1 - $n2;
    echo "La resta es $resultado";
    echo "<br>";

    $resultado = $n1 * $n2;
    echo "La multiplicación es $resultado";
    echo "<br>";

    $resultado = $n1 / $n2;
    echo "La división es $resultado";
    echo "<br>";

    $resultado = $n1 % $n2;
    echo "El resto es $resultado";
    echo "<br>";
    ?>
</body>

</html>