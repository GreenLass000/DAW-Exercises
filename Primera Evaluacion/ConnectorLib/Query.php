<?php

namespace query;

use connection\Connection;
use PDOStatement;

class Query
{
    private Connection $_connection;
    private string $_sqlQuery;
    private PDOStatement $_result;

    /**
     * @param Connection $_connection
     */
    public function __construct(Connection $_connection)
    {
        $this->_connection = $_connection;
    }

    /**
     * @return Connection
     */
    public function getConnection(): Connection
    {
        return $this->_connection;
    }

    /**
     * @return string
     */
    public function getSqlQuery(): string
    {
        return $this->_sqlQuery;
    }

    /**
     * @param string $sqlQuery
     */
    public function setSqlQuery(string $sqlQuery): void
    {
        $this->_sqlQuery = $sqlQuery;
    }

    /**
     * @return PDOStatement
     */
    public function getResult(): PDOStatement
    {
        return $this->_result;
    }

    /**
     * @param string $query
     * @param array $params
     * @return bool
     */
    public function makeQuery(string $query, array $params = []): bool
    {
        $this->_result = $this->_connection->getConnection()->prepare($query);
        return $this->_result->execute($params);
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link https://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    public function __toString(): string
    {
        return "Statement: " . $this->_sqlQuery;
    }
}