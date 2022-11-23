<?php

namespace App\Entity;

use App\Repository\PartenairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartenairesRepository::class)
 */
class Partenaires
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nomsociete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adressepostale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telPartenaire;

    /**
     * @ORM\OneToMany(targetEntity=Offre::class, mappedBy="idOffre")
     */
    private $offres;

    public function __construct()
    {
        $this->offres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomsociete(): ?string
    {
        return $this->Nomsociete;
    }

    public function setNomsociete(string $Nomsociete): self
    {
        $this->Nomsociete = $Nomsociete;

        return $this;
    }

    public function getAdressepostale(): ?string
    {
        return $this->adressepostale;
    }

    public function setAdressepostale(?string $adressepostale): self
    {
        $this->adressepostale = $adressepostale;

        return $this;
    }

    public function getTelPartenaire(): ?string
    {
        return $this->telPartenaire;
    }

    public function setTelPartenaire(?string $telPartenaire): self
    {
        $this->telPartenaire = $telPartenaire;

        return $this;
    }

    /**
     * @return Collection<int, Offre>
     */
    public function getOffres(): Collection
    {
        return $this->offres;
    }

    public function addOffre(Offre $offre): self
    {
        if (!$this->offres->contains($offre)) {
            $this->offres[] = $offre;
            $offre->setIdOffre($this);
        }

        return $this;
    }

    public function removeOffre(Offre $offre): self
    {
        if ($this->offres->removeElement($offre)) {
            // set the owning side to null (unless already changed)
            if ($offre->getIdOffre() === $this) {
                $offre->setIdOffre(null);
            }
        }

        return $this;
    }
}
