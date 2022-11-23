<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffreRepository::class)
 */
class Offre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Partenaires::class, inversedBy="offres")
     */
    private $idOffre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Don;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdOffre(): ?Partenaires
    {
        return $this->idOffre;
    }

    public function setIdOffre(?Partenaires $idOffre): self
    {
        $this->idOffre = $idOffre;

        return $this;
    }

    public function getDon(): ?string
    {
        return $this->Don;
    }

    public function setDon(string $Don): self
    {
        $this->Don = $Don;

        return $this;
    }
}
