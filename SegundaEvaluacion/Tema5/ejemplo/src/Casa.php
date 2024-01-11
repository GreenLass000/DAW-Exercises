<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "casas")]
class Casa
{
    #[ORM\Id]
    #[ORM\Column(name: "id", type: "string")]
    #[ORM\GeneratedValue]
    protected string $id;

    #[ORM\ManyToOne(targetEntity: Provincia::class, inversedBy: "Provincia")]
    #[ORM\JoinColumn(name: "id_provincia", referencedColumnName: "nombre")]
    protected mixed $provincia;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia(mixed $provincia): void
    {
        $this->provincia = $provincia;
    }

    #[ORM\OneToMany(mappedBy: "Persona", targetEntity: Persona::class)]
    protected $personas;

    public function __construct()
    {
        $this->personas = new ArrayCollection();
    }
}