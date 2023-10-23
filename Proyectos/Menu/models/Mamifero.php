<?php

namespace models;

require_once "Animal.php";

class Mamifero extends Animal
{
    private $pulmones;

    /**
     * @param $pulmones
     */
    public function __construct($patas, $pulmones)
    {
        parent::__construct($patas);
        $this->pulmones = $pulmones;
    }

    public function getPulmones()
    {
        return $this->pulmones;
    }

    public function setPulmones($pulmones): void
    {
        $this->pulmones = $pulmones;
    }

    public function __toString()
    {
        return parent::__toString() . " Pulmones: " . $this->getPulmones();
    }

}