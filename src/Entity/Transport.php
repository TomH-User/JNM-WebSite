<?php

namespace App\Entity;

use App\Repository\TransportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransportRepository::class)
 */
class Transport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Users::class, mappedBy="RefTransport")
     */
    private $idTransport;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $offre;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    public function __construct()
    {
        $this->idTransport = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getIdTransport(): Collection
    {
        return $this->idTransport;
    }

    public function addIdTransport(Users $idTransport): self
    {
        if (!$this->idTransport->contains($idTransport)) {
            $this->idTransport[] = $idTransport;
            $idTransport->setRefTransport($this);
        }

        return $this;
    }

    public function removeIdTransport(Users $idTransport): self
    {
        if ($this->idTransport->removeElement($idTransport)) {
            // set the owning side to null (unless already changed)
            if ($idTransport->getRefTransport() === $this) {
                $idTransport->setRefTransport(null);
            }
        }

        return $this;
    }

    public function getOffre(): ?string
    {
        return $this->offre;
    }

    public function setOffre(string $offre): self
    {
        $this->offre = $offre;

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
}
