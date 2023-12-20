<?php
$bd = null;
//print_r(PDO::getAvailableDrivers());
$cadena_conexion = 'mysql:dbname=usuarios;host=192.168.5.50';
$usuario = 'remoto';
$clave = '1234';
//print_r(PDO::getAvailableDrivers());
try {
    echo "Vamos a intentar conectar con el usuario: " . $usuario . "\n<br>";
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    echo "Se ha conectado.\n<br>";
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}

//select($bd);
createUser($bd);
function select($bd): void
{
    if ($bd !== null) {
        $sql = 'SELECT nombre, clave FROM users';
        $usuarios = $bd->query($sql);
        echo "Número de usuarios: " . $usuarios->rowCount() . "<br>\n";
        foreach ($usuarios as $usu) {
            print "Nombre : " . $usu['nombre'];
            print " Clave : " . $usu['clave'] . "<br>\n";
        }
    } else {
        echo "No se puede acceder a la base de datos";
    }
}

function selectPrepared($bd)
{
    if ($bd !== null) {
        $res = $bd->prepare("select nombre, clave from users where nombre = ? OR nombre = ?");
        $res->execute(array("User1", "User2"));
        echo "Contando claves de usuario: " . $res->rowCount() . "<br>\n";
        foreach ($res as $usu) {
            print $usu['nombre'] . " : " . $usu['clave'] . "<br>\n";
        }
    } else {
        echo "No se puede acceder a la base de datos";
    }
}

function createUser($bd)
{
    if ($bd !== null) {
        $insert = "INSERT INTO users(nombrdfge, clave) VALUES(MARCOS, 9999)";
        $res = $bd->query($insert);
        if ($res) {
            echo "La inserción es correcta y se han insertado " . $res->rowCount() . " filas.<br>\n";
        } else {
            print_r($bd->errorinfo());
        }
    } else {
        echo "No se puede acceder a la base de datos";
    }
}