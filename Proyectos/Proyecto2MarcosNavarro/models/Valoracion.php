<?php

namespace models;

class Valoracion
{
    private int $_idUsuario;
    private int $_idPelicula;
    private int $_valorNumerico;
    private string $_comentario;

    /**
     * @param int $_idUsuario
     * @param int $_idPelicula
     * @param int $_valorNumerico
     * @param string $_comentario
     */
    public function __construct(int $_idUsuario, int $_idPelicula, int $_valorNumerico, string $_comentario)
    {
        $this->_idUsuario = $_idUsuario;
        $this->_idPelicula = $_idPelicula;
        $this->_valorNumerico = $_valorNumerico;
        $this->_comentario = $_comentario;
    }

    public function getIdUsuario(): int
    {
        return $this->_idUsuario;
    }

    public function setIdUsuario(int $idUsuario): void
    {
        $this->_idUsuario = $idUsuario;
    }

    public function getIdPelicula(): int
    {
        return $this->_idPelicula;
    }

    public function setIdPelicula(int $idPelicula): void
    {
        $this->_idPelicula = $idPelicula;
    }

    public function getValorNumerico(): int
    {
        return $this->_valorNumerico;
    }

    public function setValorNumerico(int $valorNumerico): void
    {
        $this->_valorNumerico = $valorNumerico;
    }

    public function getComentario(): string
    {
        return $this->_comentario;
    }

    public function setComentario(string $comentario): void
    {
        $this->_comentario = $comentario;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getComentario();
    }
}