<?php

namespace models;

class Pelicula
{
    private string $_titulo;
    private int $_ano;
    private float $_duracion;
    private int $_idDirector;

    /**
     * @param string $_titulo
     * @param int $_ano
     * @param float $_duracion
     * @param int $_idDirector
     */
    public function __construct(string $_titulo, int $_ano, float $_duracion, int $_idDirector)
    {
        $this->_titulo = $_titulo;
        $this->_ano = $_ano;
        $this->_duracion = $_duracion;
        $this->_idDirector = $_idDirector;
    }

    /**
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->_titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo(string $titulo): void
    {
        $this->_titulo = $titulo;
    }

    /**
     * @return int
     */
    public function getAno(): int
    {
        return $this->_ano;
    }

    /**
     * @param int $ano
     */
    public function setAno(int $ano): void
    {
        $this->_ano = $ano;
    }

    /**
     * @return float
     */
    public function getDuracion(): float
    {
        return $this->_duracion;
    }

    /**
     * @param float $duracion
     */
    public function setDuracion(float $duracion): void
    {
        $this->_duracion = $duracion;
    }

    /**
     * @return int
     */
    public function getIdDirector(): int
    {
        return $this->_idDirector;
    }

    /**
     * @param int $idDirector
     */
    public function setIdDirector(int $idDirector): void
    {
        $this->_idDirector = $idDirector;
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return $this->getTitulo();
    }


}