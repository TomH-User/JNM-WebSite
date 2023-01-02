<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\VideoRepository;
/**
 * @ORM\Entity(repositoryClass=VideoRepository::class)
 */
class Video
{
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $refUtilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien;

    // /**
    //  * @ORM\Column(type="string", length=255)
    //  */
    // private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbVotes = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefUtilisateur(): ?Users
    {
        return $this->refUtilisateur;
    }

    public function setRefUtilisateur(Users $refUtilisateur): self
    {
        $this->refUtilisateur = $refUtilisateur->getId();

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getNbVotes(): ?int
    {
        return $this->nbVotes;
    }

    public function setNbVotes(int $nbVotes): self
    {
        $this->nbVotes = $nbVotes;

        return $this;
    }

    public function __toString(): string
    {
        return $this->lien;
    }

    // public function getEmail(): ?string
    // {
    //     return $this->email;
    // }

    // public function setEmail(string $email): self
    // {
    //     $this->email = $email;

    //     return $this;
    // }
}
