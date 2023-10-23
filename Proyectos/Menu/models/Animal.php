<?php

namespace models;

class Animal
{
    private $patas;

    /**
     * @param $patas
     */
    public function __construct($patas)
    {
        $this->patas = $patas;
    }

    public function getPatas()
    {
        return $this->patas;
    }

    public function setPatas($patas): void
    {
        $this->patas = $patas;
    }

    public function __toString()
    {
        return "Patas: " . self::getPatas();
    }
}