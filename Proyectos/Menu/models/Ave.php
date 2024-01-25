<?php

namespace models;

require_once "Animal.php";

/**
 * Clase Ave, almacena el tamaño del pico
 *
 * @author Marcos Navarro
 * @version 1.0
 * @extends Animal
 * @see Animal
 * @deprecated
 */
class Ave extends Animal
{
    private $tamanoPico;

    /**
     * Crea un Ave con las patas y el tamaño del pico
     *
     * @param $patas
     * @param $tamanoPico
     */
    public function __construct($patas, $tamanoPico)
    {
        parent::__construct($patas);
        $this->tamanoPico = $tamanoPico;
    }

    /**
     * Devuelve el tamaño del pico
     *
     * @return mixed
     */
    public function getTamanoPico()
    {
        return $this->tamanoPico;
    }

    /**
     * Cambia el tamaño del pico
     *
     * @param $tamanoPico
     * @return void
     */
    public function setTamanoPico($tamanoPico): void
    {
        $this->tamanoPico = $tamanoPico;
    }

    /**
     * Devuelve un string de Ave
     *
     * @return string
     */
    public function __toString()
    {
        return parent::__toString() . " Pico: " . $this->getTamanoPico();
    }
}