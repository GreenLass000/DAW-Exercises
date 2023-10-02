<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>WHILE</h1>
    <?php //No se ejecuta ninguna vez
    $i = 0;
    while ($i < 10) {
        echo "While $i <br>\n";
        $i = $i + 1;
    }
    ?>
    <h1>DO WHILE</h1>
    <?php
    //Se ejecuta una vez
    $i = 0;
    do {
        echo "While $i <br>\n";
        $i = $i + 1;
    } while ($i < 10);
    ?>

    <h1>WHILE BREAK</h1>
    <?php
    $i = 0;
    while ($i < 10) {
        // echo "Entro<br>";
        $i = $i + 1;
        if ($i % 2 == 1) {
            // $i++;
            continue;
        }

        echo "Iteración: $i <br>\n";
        if ($i == 8) {
            break;
        }
    }
    ?>
</body>

</html>