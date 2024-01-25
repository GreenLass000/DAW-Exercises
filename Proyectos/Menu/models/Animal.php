<?php

namespace models;

/**
 * Clase Animal, almacena las patas
 *
 * @author Marcos Navarro
 * @version 1.0
 */
class Animal
{
    private $patas;

    /**
     * Crea un animal pasando las patas como parametro
     *
     * @param $patas
     */
    public function __construct($patas)
    {
        $this->patas = $patas;
    }

    /**
     * Devuelve el numero de patas
     *
     * @return mixed
     */
    public function getPatas()
    {
        return $this->patas;
    }

    /**
     * Cambia el valor de las patas
     *
     * @param $patas
     * @return void
     */
    public function setPatas($patas): void
    {
        $this->patas = $patas;
    }

    /**
     * Devuelve un string de Animal
     *
     * @return string
     */
    public function __toString()
    {
        return "Patas: " . self::getPatas();
    }
}