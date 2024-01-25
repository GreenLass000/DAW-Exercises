<?php

namespace models;

require_once "Animal.php";

/**
 * Clase Mamifero, almacena los pulmones
 *
 * @author Marcos Navarro
 * @version 1.0
 * @extends Animal
 * @see Animal
 */
class Mamifero extends Animal
{
    private $pulmones;

    /**
     * Crea un mamifero con el numero de patas y el numero de pulmones
     *
     * @param $patas
     * @param $pulmones
     */
    public function __construct($patas, $pulmones)
    {
        parent::__construct($patas);
        $this->pulmones = $pulmones;
    }

    /**
     * Devuelve el numero de pulmones
     *
     * @return mixed
     */
    public function getPulmones(): mixed
    {
        return $this->pulmones;
    }

    /**
     * Cambia el numero de pulmones
     *
     * @param $pulmones
     * @return void
     */
    public function setPulmones($pulmones): void
    {
        $this->pulmones = $pulmones;
    }

    /**
     * Devuelve el string de mamifero
     *
     * @return string
     */
    public function __toString()
    {
        return parent::__toString() . " Pulmones: " . $this->getPulmones();
    }
}