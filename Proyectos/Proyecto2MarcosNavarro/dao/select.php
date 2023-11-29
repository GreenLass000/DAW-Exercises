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
    return get_generic($sql);
}

/**
 * @return false|PDOStatement
 */
function getDirectors(): false|PDOStatement
{
    $sql = "select * from directores";
    return get_generic($sql);
}

/**
 * @param $id
 * @return false|PDOStatement
 */
function getDirectorById($id): false|PDOStatement
{
    $sql = "select * from directores where id = " . $id;
    return get_generic($sql);
}

/**
 * @return false|PDOStatement
 */
function getPeliculas(): false|PDOStatement
{
    $sql = "
        SELECT
            peliculas.Titulo AS 'titulo',
            peliculas.id AS 'id'
        FROM 
            peliculas
    ";
    return get_generic($sql);
}

/**
 * @param $id
 * @return false|PDOStatement
 */
function getPeliculaById($id): false|PDOStatement
{
    $sql = "
    SELECT
        peliculas.id as 'id',
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
        peliculas.id = " . $id;
    return get_generic($sql);
}

/**
 * @param $id
 * @return false|PDOStatement
 */
function getValorations($id): false|PDOStatement
{
    $sql = "
    SELECT
        usuarios.nombre AS 'usuario',
        valoraciones.valorNumerico AS 'nota',
        valoraciones.comentario AS 'comentario'
    FROM
        usuarios,
        valoraciones,
        peliculas
    WHERE
        valoraciones.idUsuario = usuarios.id
    AND
        peliculas.id = valoraciones.idPelicula
    AND
        peliculas.id = " . $id;
    return get_generic($sql);
}

/**
 * @param $sql
 * @return false|PDOStatement
 */
function get_generic($sql): false|PDOStatement
{
    global $conn;
    $conn->connect();

    $result = $conn->getConnection()->query($sql);
    $conn->close();

    return $result;
}