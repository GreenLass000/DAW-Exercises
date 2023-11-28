<?php

namespace models;

class Director
{
    private int $_id;
    private string $_nombre;

    /**
     * @param int $_id
     * @param string $_nombre
     */
    public function __construct(int $_id, string $_nombre)
    {
        $this->_id = $_id;
        $this->_nombre = $_nombre;
    }

    public function getId(): int
    {
        return $this->_id;
    }

    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    public function getNombre(): string
    {
        return $this->_nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->_nombre = $nombre;
    }

    public function __toString(): string
    {
        return $this->getNombre();
    }
}