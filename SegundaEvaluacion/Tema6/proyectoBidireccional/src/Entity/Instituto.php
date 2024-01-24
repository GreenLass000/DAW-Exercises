<?php

namespace App\Entity;

use App\Repository\InstitutoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstitutoRepository::class)]
class Instituto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\OneToMany(mappedBy: 'instituto', targetEntity: Profesor::class)]
    private Collection $profesores;

    public function __construct()
    {
        $this->profesores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection<int, Profesor>
     */
    public function getProfesores(): Collection
    {
        return $this->profesores;
    }

    public function addProfesore(Profesor $profesore): static
    {
        if (!$this->profesores->contains($profesore)) {
            $this->profesores->add($profesore);
            $profesore->setInstituto($this);
        }

        return $this;
    }

    public function removeProfesore(Profesor $profesore): static
    {
        if ($this->profesores->removeElement($profesore)) {
            // set the owning side to null (unless already changed)
            if ($profesore->getInstituto() === $this) {
                $profesore->setInstituto(null);
            }
        }

        return $this;
    }
}
