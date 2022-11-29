<?php

namespace App\Entity;

use App\Repository\ActivitesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActivitesRepository::class)
 */
class Activites
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Users::class, inversedBy="activites")
     */
    private $idActivites;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $intitule;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    public function __construct()
    {
        $this->idActivites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getIdActivites(): Collection
    {
        return $this->idActivites;
    }

    public function addIdActivite(Users $idActivite): self
    {
        if (!$this->idActivites->contains($idActivite)) {
            $this->idActivites[] = $idActivite;
        }

        return $this;
    }
    public function setIdActivite(int $idActivites): self
    {
        $this->idActivites = $idActivites;

        return $this;
    }

    public function removeIdActivite(Users $idActivite): self
    {
        $this->idActivites->removeElement($idActivite);

        return $this;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}
