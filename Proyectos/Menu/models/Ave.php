<?php

namespace models;

require_once "Animal.php";

class Ave extends Animal
{
    private $tamanoPico;

    /**
     * @param $tamanoPico
     */
    public function __construct($patas, $tamanoPico)
    {
        parent::__construct($patas);
        $this->tamanoPico = $tamanoPico;
    }

    public function getTamanoPico()
    {
        return $this->tamanoPico;
    }

    public function setTamanoPico($tamanoPico): void
    {
        $this->tamanoPico = $tamanoPico;
    }

    public function __toString()
    {
        return parent::__toString() . " Pico: " . $this->getTamanoPico();
    }
}