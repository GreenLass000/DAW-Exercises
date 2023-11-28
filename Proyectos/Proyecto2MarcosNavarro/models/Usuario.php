<?php

namespace models;

class Usuario
{
    private string $_correoElectronico;
    private string $_clave;
    private string $_nombre;

    /**
     * @param string $_correoElectronico
     * @param string $_clave
     * @param string $_nombre
     */
    public function __construct(string $_correoElectronico, string $_clave, string $_nombre)
    {
        $this->_correoElectronico = $_correoElectronico;
        $this->_clave = $_clave;
        $this->_nombre = $_nombre;
    }

    public function getCorreoElectronico(): string
    {
        return $this->_correoElectronico;
    }

    public function setCorreoElectronico(string $correoElectronico): void
    {
        $this->_correoElectronico = $correoElectronico;
    }

    public function getClave(): string
    {
        return $this->_clave;
    }

    public function setClave(string $clave): void
    {
        $this->_clave = $clave;
    }

    public function getNombre(): string
    {
        return $this->_nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->_nombre = $nombre;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getNombre();
    }
}