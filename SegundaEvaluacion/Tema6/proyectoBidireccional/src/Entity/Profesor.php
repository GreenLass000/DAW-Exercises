<?php

namespace App\Entity;

use App\Repository\ProfesorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesorRepository::class)]
class Profesor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 9)]
    private ?string $dni = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nombre = null;

    #[ORM\ManyToOne(inversedBy: 'profesores')]
    private ?Instituto $instituto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): static
    {
        $this->dni = $dni;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getInstituto(): ?Instituto
    {
        return $this->instituto;
    }

    public function setInstituto(?Instituto $instituto): static
    {
        $this->instituto = $instituto;

        return $this;
    }
}
