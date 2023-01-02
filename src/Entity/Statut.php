<?php

namespace App\Entity;

use App\Repository\StatutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatutRepository::class)
 */
class Statut
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Users::class, inversedBy="RefStatut")
     */
    private $idStatut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomStatut;

    public function __construct()
    {
        $this->idStatut = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getIdStatut(): Collection
    {
        return $this->idStatut;
    }

    public function addIdStatut(Users $idStatut): self
    {
        if (!$this->idStatut->contains($idStatut)) {
            $this->idStatut[] = $idStatut;
        }

        return $this;
    }

    public function removeIdStatut(Users $idStatut): self
    {
        $this->idStatut->removeElement($idStatut);

        return $this;
    }

    public function getNomStatut(): ?string
    {
        return $this->NomStatut;
    }

    public function setNomStatut(string $NomStatut): self
    {
        $this->NomStatut = $NomStatut;

        return $this;
    }

    public function __toString(): string
    {
        return $this->NomStatut;
    }
}
