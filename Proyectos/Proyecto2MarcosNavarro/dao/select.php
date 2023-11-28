<?php

use models\Connection;

include_once "../models/Connection.php";

$conn = new Connection("root", "", "proyecto");

/**
 * @param $user
 * @return false|PDOStatement
 */
function getUser($user): false|PDOStatement
{
    $sql = "select * from usuarios where nombre = '" . $user . "'";
    return generic($sql);
}

/**
 * @return false|PDOStatement
 */
function getDirectors(): false|PDOStatement
{
    $sql = "select * from directores";
    return generic($sql);
}

/**
 * @param $id
 * @return false|PDOStatement
 */
function getDirectorById($id): false|PDOStatement
{
    $sql = "select * from directores where id = '" . $id . "'";
    return generic($sql);
}

/**
 * @return false|PDOStatement
 */
function getPeliculas(): false|PDOStatement
{
    $sql = "select Titulo from peliculas";
    return generic($sql);
}

/**
 * @param $id
 * @return false|PDOStatement
 */
function getPeliculaById($id): false|PDOStatement
{
    $sql = "
    SELECT
        peliculas.Titulo AS 'titulo',
        peliculas.Anio AS 'año',
        peliculas.Duracion AS 'duracion',
        directores.nombre AS 'director'
    FROM
        peliculas,
        directores
    WHERE
        peliculas.idDirector = directores.id
    AND
        peliculas.id = '" . $id . "';
    ";
    return generic($sql);
}

function getValorations($id) {
    $sql = "
    SELECT
        
    ";
}

/**
 * @param $sql
 * @return false|PDOStatement
 */
function generic($sql): false|PDOStatement
{
    global $conn;
    $conn->connect();

    $result = $conn->getConnection()->query($sql);
    $conn->close();

    return $result;
}