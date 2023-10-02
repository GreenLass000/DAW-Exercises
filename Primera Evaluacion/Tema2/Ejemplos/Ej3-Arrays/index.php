<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //Uso de la función array() para declararlos
    $varArray = array(
        "clave1" => "valor1",
        "clave2" => "valor2",
        "claveN" => "valorN"
    );
    //Uso de corchetes para declararlos
    $varArray2 = [
        "valor1",
        "valor2",
        "valorN"
    ];

    echo var_dump($varArray);
    echo "<br><br><br><br>";
    echo var_dump($varArray2);
    ?>
</body>

</html>