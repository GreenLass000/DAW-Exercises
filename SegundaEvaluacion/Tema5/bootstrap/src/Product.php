<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'ejemplo')]
class Product
{
    #[ORM\Id]
    #[ORM\Column(name: "identificador ", type: 'integer')]
    #[ORM\GeneratedValue]
    protected int $id;

    #[ORM\Column(name: "nombre", type: 'string')]
    protected string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }
}