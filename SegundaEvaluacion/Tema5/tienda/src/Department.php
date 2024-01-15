<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "departamentos")]
class Department
{
    #[ORM\Id]
    #[ORM\Column(name: "nombre")]
    protected string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    #[ORM\OneToMany(mappedBy: "department", targetEntity: Product::class)]
    protected mixed $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getProducts(): mixed
    {
        return $this->products;
    }
}