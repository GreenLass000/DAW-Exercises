<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "personas")]
class Persona
{
    #[ORM\Id]
    #[ORM\Column(name: "dni", type: "string")]
    protected string $dni;

    #[ORM\ManyToOne(targetEntity: Casa::class, inversedBy: "Casa")]
    #[ORM\JoinColumn(name: "id_casa", referencedColumnName: "id")]
    protected $casa;

    public function getDni(): string
    {
        return $this->dni;
    }

    public function setDni(string $dni): void
    {
        $this->dni = $dni;
    }

    public function getCasa()
    {
        return $this->casa;
    }

    public function setCasa($casa): void
    {
        $this->casa = $casa;
    }
}