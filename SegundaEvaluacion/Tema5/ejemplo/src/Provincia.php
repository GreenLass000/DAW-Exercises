<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "provincias")]
class Provincia
{
    #[ORM\Id]
    #[ORM\Column(name: "nombre", type: "string")]
    protected string $nombre;

    #[ORM\Column(name: "extension", type: "integer")]
    protected int $extension;

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getExtension(): int
    {
        return $this->extension;
    }

    public function setExtension(int $extension): void
    {
        $this->extension = $extension;
    }

    #[ORM\OneToMany(mappedBy: "Casa", targetEntity: Casa::class)]
    protected $casas;

    public function __construct()
    {
        $this->casas = new ArrayCollection();
    }

    public function getCasas(): ArrayCollection
    {
        return $this->casas;
    }

    public function setCasas(ArrayCollection $casas): void
    {
        $this->casas = $casas;
    }
}