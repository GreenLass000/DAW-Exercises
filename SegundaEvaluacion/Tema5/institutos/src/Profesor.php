<?php

//namespace src;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'profesores')]
class Profesor
{
    #[ORM\Id]
    #[ORM\Column(type: 'string')]
    private string $dni;
    #[ORM\Column(type: 'string')]
    private string $nombre;
    #[ORM\ManyToOne(targetEntity: Instituto::class, inversedBy: "profesores")]
    #[ORM\JoinColumn(name: 'instituto', referencedColumnName: 'nombre')]
    private Instituto $centro;

    public function getDni(): string
    {
        return $this->dni;
    }

    public function setDni(string $dni): void
    {
        $this->dni = $dni;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getCentro(): Instituto
    {
        return $this->centro;
    }

    public function setCentro(Instituto $centro): void
    {
        $this->centro = $centro;
    }
}