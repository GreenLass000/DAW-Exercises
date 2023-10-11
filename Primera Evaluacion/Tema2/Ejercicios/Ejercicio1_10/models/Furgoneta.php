<?php

namespace Ejercicio1_10\models;

class Furgoneta extends Coche
{
    private $cv;
    private $numPuertas;
    private $sillitalsofix;
    private $capacidadCarga;
    private $valocidadMaxima;

    /**
     * @param $cv
     * @param $numPuertas
     * @param $sillitalsofix
     * @param $capacidadCarga
     * @param $valocidadMaxima
     */
    public function __construct($matricula, $color, $plazas, $peso, $longitud, $ruedas, $cv, $numPuertas, $sillitalsofix, $capacidadCarga, $valocidadMaxima)
    {
        parent::__construct($matricula, $color, $plazas, $peso, $longitud, $ruedas);

        $this->cv = $cv;
        $this->numPuertas = $numPuertas;
        $this->sillitalsofix = $sillitalsofix;
        $this->capacidadCarga = $capacidadCarga;
        $this->valocidadMaxima = $valocidadMaxima;
    }
}