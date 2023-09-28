<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $n1 = 'a';
    $n2 = false;
    $n3 = null;

    echo var_dump($n1);
    echo "<br>";

    echo gettype($n1);
    echo "<br>";

    echo var_dump($n2);
    echo "<br>";

    echo gettype($n2);
    echo "<br>";

    echo var_dump($n3);
    echo "<br>";

    echo gettype($n3);
    ?>
</body>

</html>