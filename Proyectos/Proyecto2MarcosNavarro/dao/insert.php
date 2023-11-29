<?php

use models\Connection;

include_once "../models/Connection.php";

$conn = new Connection("root", "", "proyecto");

/**
 * @param array $data
 * @return int
 */
function postValoration(array $data): int
{
    $sql = "
    INSERT INTO
        valoraciones (
                      idUsuario,
                      idPelicula,
                      valorNumerico,
                      comentario)
    VALUES (
            " . $data["idu"] . ",
            " . $data["idp"] . ",
            " . $data["nota"] . ",
            '" . $data["com"] . "'
    )
    ";
    return post_generic($sql);
}

/**
 * @param array $data
 * @return int
 */
function postPelicula(array $data): int
{
    $sql = "
    INSERT INTO
        peliculas (
                   Titulo,
                   Anio,
                   Duracion,
                   idDirector)
    VALUES (
            '" . $data["tit"] . "',
            " . $data["ano"] . ",
            " . $data["dur"] . ",
            '" . $data["dir"] . "'
    );
    ";
    return post_generic($sql);
}

/**
 * @param string $sql
 * @return int
 */
function post_generic(string $sql): int
{
    global $conn;
    $conn->connect();

    $conn->getConnection()->beginTransaction();
    $result = $conn->getConnection()->query($sql);

    if ($result) {
        $conn->getConnection()->commit();
        $conn->close();
        return 0;
    } else {
        $conn->getConnection()->rollBack();
        $conn->close();
        return 1;
    }
}