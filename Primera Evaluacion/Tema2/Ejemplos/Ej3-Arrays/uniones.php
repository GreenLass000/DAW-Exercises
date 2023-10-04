<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $varArray = array(1 => 5, 2 => 10, 3 => 15);
    $varArray2 = array(3 => 20, 4 => 25);
    $sumaArray = $varArray + $varArray2;

    print_r($varArray);
    echo ("<br>");
    print_r($varArray2);
    echo ("<br>");
    print_r($sumaArray);
    ?>
</body>

</html>