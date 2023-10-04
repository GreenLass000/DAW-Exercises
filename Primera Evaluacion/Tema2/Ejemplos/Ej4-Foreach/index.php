<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $varArray = array("clave1" => 1, "clave2" => 2, "claveN" => 3);
    print_r($varArray);
    echo ("<br>");
    $suma = 0;
    foreach ($varArray as $valor) {
        echo "$valor <br>\n";
        $suma += $valor;
    }
    echo ("La suma es $suma");
    ?>
</body>

</html>