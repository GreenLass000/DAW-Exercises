<?php

namespace lib\connector;

use PDO;
use PDOStatement;

/**
 * @author Marcos Navarro
 * @version 1.2
 */
class Query
{
    /**
     * @var Connection Objeto de conexion a la base de datos
     * @see Connection
     */
    private Connection $_connection;

    /**
     * @var PDOStatement Resultado de las consultas a base de datos realizadas
     * @see PDOStatement
     */
    private PDOStatement $_result;

    /**
     * Crea un objeto <code>Query</code> pasando como parametro la conexion a la base de datos
     * donde quieres hacer las consultas
     *
     * @param Connection $_connection Conexion a la base de datos
     * @see Connection
     */
    public function __construct(Connection $_connection)
    {
        $this->_connection = $_connection;
    }

    /**
     * Devuelve la conexion a la base de datos
     *
     * @return Connection Conexion a la base de datos
     * @see Connection
     */
    public function getConnection(): Connection
    {
        return $this->_connection;
    }

    /**
     * Devuelve el resultado de la consulta realizada
     *
     * @return PDOStatement Resultado de consulta realizada
     * @see PDOStatement
     */
    public function getResult(): PDOStatement
    {
        return $this->_result;
    }

    /**
     *
     *
     * @param string $query
     * @param array $params
     * @return false|array
     */
    public function select(string $query, array $params): false|array
    {
        $this->getConnection()->connect();

        $this->_result = $this->getConnection()->getConnection()->prepare($query);
        foreach ($params as $key => $value) {
            $this->_result->bindValue($key, $value);
        }

        $this->_result->execute();
        $return = $this->_result->fetchAll(PDO::FETCH_ASSOC);

        $this->getConnection()->close();
        return $return;
    }

    /**
     * @param string $query
     * @param array $params
     * @return false|PDOStatement
     */
    public function insert(string $query, array $params): false|PDOStatement
    {
        $this->getConnection()->connect();

        $this->_result = $this->getConnection()->getConnection()->prepare($query);
        foreach ($params as $key => $value) {
            $this->_result->bindParam($key, $value);
        }
        $return = $this->_result->execute();

        $this->getConnection()->close();
        return $return;
    }

    /**
     * @param string $query
     * @param array $params
     * @return bool
     */
    public function update(string $query, array $params): bool
    {
        $this->getConnection()->connect();

        $this->_result = $this->getConnection()->getConnection()->prepare($query);
        foreach ($params as $key => $value) {
            $this->_result->bindParam($key, $value);
        }
        $return = $this->_result->execute();

        $this->getConnection()->close();
        return $return;
    }

    /**
     * @param string $query
     * @param array $params
     * @return null
     * @todo Implementar metodo para borrar datos
     */
    public function delete(string $query, array $params): null
    {
        return null;
    }

    /**
     * En base a la consulta, ejecuta un metodo u otro
     *
     * @param string $query
     * @param array $params
     * @return PDOStatement|array|bool|null
     * @deprecated Usar los metodos <code>insert</code>, <code>select</code>,
     * <code>update</code> y <code>delete</code> en su lugar
     */
    public function makeQuery(string $query, array $params): PDOStatement|array|bool|null
    {
        $type = strtolower(explode(" ", $query)[0]);
        $return = null;
        switch ($type) {
            case "select":
                $return = $this->select($query, $params);
                break;
            case "insert":
                $return = $this->insert($query, $params);
                break;
            case "update":
                $return = $this->update($query, $params);
                break;
            case "delete":
                $return = $this->delete($query, $params);
                break;
            default:
                break;
        }
        return $return;
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link https://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     * @todo Añadir un toString
     */
    public function __toString(): string
    {
        return "";
    }
}