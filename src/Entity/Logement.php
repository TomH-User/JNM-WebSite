<?php

namespace App\Entity;

use App\Repository\LogementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogementRepository::class)
 */
class Logement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Users::class, mappedBy="RefLogement")
     */
    private $idLogement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomLogement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbplaces;

    public function __construct()
    {
        $this->idLogement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getIdLogement(): Collection
    {
        return $this->idLogement;
    }

    public function addIdLogement(Users $idLogement): self
    {
        if (!$this->idLogement->contains($idLogement)) {
            $this->idLogement[] = $idLogement;
            $idLogement->setRefLogement($this);
        }

        return $this;
    }

    public function removeIdLogement(Users $idLogement): self
    {
        if ($this->idLogement->removeElement($idLogement)) {
            // set the owning side to null (unless already changed)
            if ($idLogement->getRefLogement() === $this) {
                $idLogement->setRefLogement(null);
            }
        }

        return $this;
    }

    public function getNomLogement(): ?string
    {
        return $this->nomLogement;
    }

    public function setNomLogement(string $nomLogement): self
    {
        $this->nomLogement = $nomLogement;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNbplaces(): ?int
    {
        return $this->nbplaces;
    }

    public function setNbplaces(int $nbplaces): self
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }

    public function __toString(): string
    {
        return $this->nomLogement;
    }
}
