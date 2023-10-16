<?php

namespace Ejercicio1_10\models;
require_once "Coche.php";

class Deportivo extends Coche
{
    private $cv;
    private $numPuertas;

    /**
     * @param $cv
     * @param $numPuertas
     */
    public function __construct($matricula, $color, $plazas, $peso, $longitud, $ruedas, $cv, $numPuertas)
    {
        parent::__construct($matricula, $color, $plazas, $peso, $longitud, $ruedas);
        $this->cv = $cv;
        $this->numPuertas = $numPuertas;
    }

    public function getCv()
    {
        return $this->cv;
    }

    public function setCv($cv): void
    {
        $this->cv = $cv;
    }

    public function getNumPuertas()
    {
        return $this->numPuertas;
    }

    public function setNumPuertas($numPuertas): void
    {
        $this->numPuertas = $numPuertas;
    }

    public function __toString()
    {
        return parent::__toString() . " deportivo";
    }
}