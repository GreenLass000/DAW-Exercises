<?php

namespace query;

use ConnectorLib\Connection;
use PDO;
use PDOStatement;

class Query
{
    private Connection $_connection;
    private string $_sqlQuery;
    private PDOStatement $_result;
    private PDO $_pdo;

    /**
     * @param Connection $_connection
     */
    public function __construct(Connection $_connection)
    {
        $this->_connection = $_connection;

        $host = $_connection->getHost();
        $dbname = $_connection->getDatabase();
        $port = $_connection->getPort();
        $user = $_connection->getUsername();
        $pass = $_connection->getPassword();

        $dsn = "mysql:host=$host;dbname=$dbname;port=$port";
        $this->_pdo = new PDO($dsn, $user, $pass);
    }

    /**
     * @return Connection
     */
    public function getConnection(): Connection
    {
        return $this->_connection;
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->_pdo;
    }

    /**
     * @param PDO $pdo
     * @return void
     */
    public function setPdo(PDO $pdo): void
    {
        $this->_pdo = $pdo;
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
        $this->getConnection()->connect();

        $this->_result = $this->_connection->getConnection()->prepare($query);
        $return = $this->_result->execute($params);

        $this->getConnection()->close();

        return $return;
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