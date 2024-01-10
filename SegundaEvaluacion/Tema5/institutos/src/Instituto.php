<?php

//namespace src;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'institutos')]
class Instituto
{
    #[ORM\Id]
    #[ORM\Column(type: 'string')]
    private string $nombre;
    #[ORM\Column(type: 'string')]
    private string $ciudad;

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getCiudad(): string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad): void
    {
        $this->ciudad = $ciudad;
    }

    #[ORM\OneToMany(mappedBy: "centro", targetEntity: Profesor::class)]
    private $profesores;

    public function __construct()
    {
        $this->profesores = new ArrayCollection();
    }

    public function getProfesores()
    {
        return $this->profesores;
    }
}