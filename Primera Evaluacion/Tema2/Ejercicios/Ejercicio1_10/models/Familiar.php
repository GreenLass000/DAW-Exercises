<?php

namespace Ejercicio1_10\models;
require_once "Coche.php";

class Familiar extends Coche
{
    private $sillitalsofix;

    /**
     * @param $sillitalsofix
     */
    public function __construct($matricula, $color, $plazas, $peso, $longitud, $ruedas, $sillitalsofix)
    {
        parent::__construct($matricula, $color, $plazas, $peso, $longitud, $ruedas);
        $this->sillitalsofix = $sillitalsofix;
    }

    public function getSillitalsofix()
    {
        return $this->sillitalsofix;
    }

    public function setSillitalsofix($sillitalsofix): void
    {
        $this->sillitalsofix = $sillitalsofix;
    }

    public function __toString()
    {
        return parent::__toString() . " familiar";
    }
}