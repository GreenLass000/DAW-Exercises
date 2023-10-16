<?php

namespace Ejercicio1_10\models;

class Coche
{
    private $matricula;
    private $color;
    private $plazas;
    private $peso;
    private $longitud;
    private $ruedas;
    private static $genericCont;

    public function __construct($matricula, $color, $plazas, $peso, $longitud, $ruedas)
    {
        $this->matricula = $matricula;
        $this->color = $color;
        $this->plazas = $plazas;
        $this->peso = $peso;
        $this->longitud = $longitud;
        $this->ruedas = $ruedas;

        self::addCont();
    }

    private static function addCont()
    {
        self::$genericCont++;
    }

    public static function showCont()
    {
        return self::$genericCont;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color): void
    {
        $this->color = $color;
    }

    public function getPlazas()
    {
        return $this->plazas;
    }

    public function setPlazas($plazas): void
    {
        $this->plazas = $plazas;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso): void
    {
        $this->peso = $peso;
    }

    public function getLongitud()
    {
        return $this->longitud;
    }

    public function setLongitud($longitud): void
    {
        $this->longitud = $longitud;
    }

    public function getRuedas()
    {
        return $this->ruedas;
    }

    public function setRuedas($ruedas): void
    {
        $this->ruedas = $ruedas;
    }

    public function __toString()
    {
        return "$this->matricula; $this->color";
    }
}