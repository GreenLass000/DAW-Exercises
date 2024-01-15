<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "productos")]
class Product
{
    #[ORM\Id]
    #[ORM\Column(name: "id")]
    #[ORM\GeneratedValue]
    protected int $id;

    #[ORM\Column(name: "nombre")]
    protected string $name;

    #[ORM\Column(name: "unidades")]
    protected int $units;

    #[ORM\ManyToOne(targetEntity: Department::class, inversedBy: "products")]
    #[ORM\JoinColumn(name: "departamento", referencedColumnName: "nombre")]
    protected Department $department;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getUnits(): int
    {
        return $this->units;
    }

    public function setUnits(int $units): void
    {
        $this->units = $units;
    }

    public function getDepartment(): Department
    {
        return $this->department;
    }

    public function setDepartment(Department $department): void
    {
        $this->department = $department;
    }
}