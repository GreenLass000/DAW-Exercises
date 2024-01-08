<?php

namespace connection;

use PDO;
use PDOException;

/**
 * Objeto Connection, crea y gestiona tod o lo necesario para crear y cerrar una conexion a una base de datos PHPMyAdmin
 */
class Connection
{
    private string $_username;
    private string $_password;
    private string $_database;
    private string $_host;
    private string $_port;
    private PDO|null $_connection;

    /**
     * Crea una instancia de <code>Connection</code>
     *
     * @param string $_username Usuario de PHPMyAdmin
     * @param string $_password Contraseña de PHPMyAdmin
     * @param string $_database Nombre de la base de datos a la que quieres acceder
     * @param string $_host Dirección del servidor donde se aloja PHPMyAdmin, por defecto es <code>localhost</code>
     * @param string $_port Puerto en el que se está ejecutando PHPMyAmin, por defecto es <code>3306</code>
     */
    public function __construct(string $_username, string $_password, string $_database,
                                string $_host = "localhost", string $_port = "3306")
    {
        $this->_username = $_username;
        $this->_password = $_password;
        $this->_database = $_database;
        $this->_host = $_host;
        $this->_port = $_port;
    }

    /**
     * Devuelve el usuario de PHPMyAdmin
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->_username;
    }

    /**
     * Modifica el usuario de PHPMyAdmin
     *
     * @param string $username Nuevo username que quieres asignar
     * @return void
     */
    public function setUsername(string $username): void
    {
        $this->_username = $username;
    }

    /**
     * Devuelve la contraseña de PHPMyAdmin
     *
     * @return string Contraseña de PHPMyAdmin
     */
    public function getPassword(): string
    {
        return $this->_password;
    }

    /**
     * Modifica la contraseña de PHPMyAdmin
     *
     * @param string $password Nueva contraseña que quieres asignar
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->_password = $password;
    }

    /**
     * Devuelve el nombre de la base de datos de PHPMyAdmin
     *
     * @return string Nombre de base de datos de PHPMyAdmin
     */
    public function getDatabase(): string
    {
        return $this->_database;
    }

    /**
     * Modifica el nombre de la base de datos de PHPMyAdmin
     *
     * @param string $database Nuevo nombre de base de datos que quieres asignar
     * @return void
     */
    public function setDatabase(string $database): void
    {
        $this->_database = $database;
    }

    /**
     * Devuelve el host de PHPMyAdmin
     *
     * @return string Host de PHPMyAdmin
     */
    public function getHost(): string
    {
        return $this->_host;
    }

    /**
     * Modifica el host de PHPMyAdmin
     *
     * @param string $host Nuevo host que quieres asignar
     * @return void
     */
    public function setHost(string $host): void
    {
        $this->_host = $host;
    }

    /**
     * Devuelve el puerto de PHPMyAdmin
     *
     * @return string Puerto de PHPMyAdmin
     */
    public function getPort(): string
    {
        return $this->_port;
    }

    /**
     * Modifica el puerto de PHPMyAdmin
     *
     * @param int $port Nuevo puerto que quieres asignar
     * @return void
     */
    public function setPort(int $port): void
    {
        $this->_port = $port;
    }

    /**
     * Devuelve el objeto PDO de la conexión
     *
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->_connection;
    }

    /**
     * @return string
     */
    private function getConnectionStr(): string
    {
        return "mysql:dbname={$this->getDatabase()};host={$this->getHost()}:{$this->getPort()}";
    }

    /**
     * @param string $err_message
     * @param bool $stackTrace
     * @return PDO|int
     */
    function connect(string $err_message = "Error con la base de datos: ",
                     bool   $stackTrace = true): PDO|int
    {
        try {
            $this->_connection = new PDO($this->getConnectionStr(),
                $this->getUsername(), $this->getPassword());
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->getConnection();
        } catch (PDOException $e) {
            $msg = $err_message;
            if ($stackTrace) {
                $msg .= $e->getMessage();
            }
            die($msg);
        }
    }

    /**
     * @return void
     */
    function close(): void
    {
        $this->_connection = null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getConnectionStr();
    }
}