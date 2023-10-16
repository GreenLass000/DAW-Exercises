<?php

namespace Ejercicio1_10\models;
require_once "Coche.php";

class Furgoneta extends Coche
{
    private $capacidadCarga;
    private $valocidadMaxima;

    /**
     * @param $capacidadCarga
     * @param $valocidadMaxima
     */
    public function __construct($matricula, $color, $plazas, $peso, $longitud, $ruedas, $capacidadCarga, $valocidadMaxima)
    {
        parent::__construct($matricula, $color, $plazas, $peso, $longitud, $ruedas);
        $this->capacidadCarga = $capacidadCarga;
        $this->valocidadMaxima = $valocidadMaxima;
    }

    public function getCapacidadCarga()
    {
        return $this->capacidadCarga;
    }

    public function setCapacidadCarga($capacidadCarga): void
    {
        $this->capacidadCarga = $capacidadCarga;
    }

    public function getValocidadMaxima()
    {
        return $this->valocidadMaxima;
    }

    public function setValocidadMaxima($valocidadMaxima): void
    {
        $this->valocidadMaxima = $valocidadMaxima;
    }

    public function __toString()
    {
        return parent::__toString() . " furgoneta";
    }
}