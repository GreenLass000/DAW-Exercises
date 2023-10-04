<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $varArray = array(1 => 5, 2 => 10, 3 => 15, 4 => 20);
    $varArray2 = array(1 => 5, 2 => 10, 4 => 20, 3 => 15);
    $varArray3 = array(1 => 5, 2 => 10, 4 => 20, 3 => 15);

    print_r($varArray);
    echo ("<br>");

    print_r($varArray2);
    echo ("<br>");

    print_r($varArray3);
    echo ("<br>");

    if ($varArray === $varArray2) echo "1 y 2 Son idénticos <br>\n";
    if ($varArray == $varArray2) echo "1 y 2 Son iguales <br>\n";
    if ($varArray3 === $varArray2) echo "2 y 3 Son idénticos <br>\n";
    if ($varArray3 == $varArray2) echo "2 y 3 Son iguales <br>\n";
    ?>
</body>

</html>