<?php

namespace lib\connector;

use PDO;
use PDOException;

/**
 * @author Marcos Navarro
 * @version 1.2
 */
class Connection
{
    /**
     * @var string Nombre del usuario de phpMyAdmin
     */
    private string $_username;

    /**
     * @var string Contraseña de phpMyAdmin
     */
    private string $_password;

    /**
     * @var string Nombre de la base de datos de phpMyAdmin
     */
    private string $_database;

    /**
     * @var string Host de phpMyAdmin
     */
    private string $_host;

    /**
     * @var string Puerto de phpMyAdmin
     */
    private string $_port;

    /**
     * @var PDO|null Objeto PDO que almacena la conexion a la base de datos
     */
    private PDO|null $_connection;

    /**
     * Crea una nueva conexión a phpMyAdmin
     *
     * @param string $_username Nombre del usuario
     * @param string $_password Contraseña
     * @param string $_database Nombre de la base de datos
     * @param string $_host Direccion donde se aloja el servidor, por defecto <code>localhost</code>
     * @param string $_port Puerto del servidor, por defecto <code>3306</code>
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
     * Devuelve el nombre de usuario
     *
     * @return string Nombre de usuario
     */
    public function getUsername(): string
    {
        return $this->_username;
    }

    /**
     * Cambia el valor de <code>username</code>
     *
     * @param string $username Nuevo valor de <code>username</code>
     */
    public function setUsername(string $username): void
    {
        $this->_username = $username;
    }

    /**
     * Devuelve la contraseña
     *
     * @return string Contraseña
     */
    public function getPassword(): string
    {
        return $this->_password;
    }

    /**
     * Cambia el valor de <code>password</code>
     *
     * @param string $password Nuevo valor de <code>password</code>
     */
    public function setPassword(string $password): void
    {
        $this->_password = $password;
    }

    /**
     * Devuelve el nombre de la base de datos
     *
     * @return string Nombre de la base de datos
     */
    public function getDatabase(): string
    {
        return $this->_database;
    }

    /**
     * Cambia el valor de <code>database</code>
     *
     * @param string $database Nuevo valor de <code>database</code>
     */
    public function setDatabase(string $database): void
    {
        $this->_database = $database;
    }

    /**
     * Devuelve el <code>host</code>
     *
     * @return string <code>Host</code>
     */
    public function getHost(): string
    {
        return $this->_host;
    }

    /**
     * Cambia el valor de <code>host</code>
     *
     * @param string $host Nuevo valor de <code>host</code>
     */
    public function setHost(string $host): void
    {
        $this->_host = $host;
    }

    /**
     * Devuelve el puerto
     *
     * @return string Puerto
     */
    public function getPort(): string
    {
        return $this->_port;
    }

    /**
     * Cambia el valor de <code>port</code>
     *
     * @param string $port Nuevo valor de <code>port</code>
     */
    public function setPort(string $port): void
    {
        $this->_port = $port;
    }

    /**
     * Devuele la conexion a la base de datos
     *
     * @return PDO Conexion
     */
    public function getConnection(): PDO
    {
        return $this->_connection;
    }

    /**
     * Devuelve un <code>string</code> de la cadena de conexion a la base de datos
     *
     * @return string Cadena de conexion
     */
    private function getConnectionStr(): string
    {
        return "mysql:dbname={$this->getDatabase()};host={$this->getHost()}:{$this->getPort()}";
    }

    /**
     * Crea una conexion usando un objeto <code>PDO</code> y los datos de conexión almacenados en <code>conection</code>
     *
     * @param string $err_message Mensaje de error que aparecera si ocurre alguna clase de error, por defecto 'Error en la base de datos'
     * @param bool $stackTrace Activa o desactiva el <code>stackTrace</code> de errores, por defecto <code>true</code>
     * @return PDO|int Devuelve una conexion si no ha habido errores, en caso contrario devuelve un numero con el codigo de error
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
     * Cierra la conexion
     */
    function close(): void
    {
        $this->_connection = null;
    }

    /**
     * Devuelve la cadena de conexion de la base de datos
     *
     * @return string Cadena de conexion
     * @see getConnectionStr()
     */
    public function __toString(): string
    {
        return $this->getConnectionStr();
    }
}