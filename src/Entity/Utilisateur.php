<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $NumUtilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Numtel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MIAGE;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Region;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Reflogement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Etatlogement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reftransport;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etattransport;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumUtilisateur(): ?int
    {
        return $this->NumUtilisateur;
    }

    public function setNumUtilisateur(int $NumUtilisateur): self
    {
        $this->NumUtilisateur = $NumUtilisateur;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->DateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $DateNaissance): self
    {
        $this->DateNaissance = $DateNaissance;

        return $this;
    }

    public function getNumtel(): ?string
    {
        return $this->Numtel;
    }

    public function setNumtel(?string $Numtel): self
    {
        $this->Numtel = $Numtel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getMIAGE(): ?string
    {
        return $this->MIAGE;
    }

    public function setMIAGE(string $MIAGE): self
    {
        $this->MIAGE = $MIAGE;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->Region;
    }

    public function setRegion(string $Region): self
    {
        $this->Region = $Region;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->Statut;
    }

    public function setStatut(?string $Statut): self
    {
        $this->Statut = $Statut;

        return $this;
    }

    public function getReflogement(): ?string
    {
        return $this->Reflogement;
    }

    public function setReflogement(string $Reflogement): self
    {
        $this->Reflogement = $Reflogement;

        return $this;
    }

    public function getEtatlogement(): ?string
    {
        return $this->Etatlogement;
    }

    public function setEtatlogement(string $Etatlogement): self
    {
        $this->Etatlogement = $Etatlogement;

        return $this;
    }

    public function getReftransport(): ?string
    {
        return $this->reftransport;
    }

    public function setReftransport(string $reftransport): self
    {
        $this->reftransport = $reftransport;

        return $this;
    }

    public function getEtattransport(): ?string
    {
        return $this->etattransport;
    }

    public function setEtattransport(string $etattransport): self
    {
        $this->etattransport = $etattransport;

        return $this;
    }
}
