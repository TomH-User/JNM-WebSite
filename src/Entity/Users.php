<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NumTel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $miage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $region;

    /**
     * @ORM\Column(type="smallint")
     */
    private $etatLogement=0;

    /**
     * @ORM\Column(type="smallint")
     */
    private $EtatTransport=0;

    /**
     * @ORM\ManyToOne(targetEntity=Transport::class, inversedBy="idTransport")
     */
    private $RefTransport;

    /**
     * @ORM\ManyToOne(targetEntity=Logement::class, inversedBy="idLogement")
     */
    private $RefLogement;

    /**
     * @ORM\ManyToMany(targetEntity=Activites::class, mappedBy="idActivites")
     */
    private $activites;

    /**
     * @ORM\ManyToMany(targetEntity=Statut::class, mappedBy="NomStatut")
     */
    private $RefStatut;

    public function __construct()
    {
        $this->activites = new ArrayCollection();
        $this->RefStatut = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER'; 

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
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

    public function getNumTel(): ?string
    {
        return $this->NumTel;
    }

    public function setNumTel(?string $NumTel): self
    {
        $this->NumTel = $NumTel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getMiage(): ?string
    {
        return $this->miage;
    }

    public function setMiage(string $miage): self
    {
        $this->miage = $miage;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getEtatLogement(): ?int
    {
        return $this->etatLogement;
    }

    public function setEtatLogement(int $etatLogement): self
    {
        $this->etatLogement = $etatLogement;

        return $this;
    }

    public function getEtatTransport(): ?int
    {
        return $this->EtatTransport;
    }

    public function setEtatTransport(int $EtatTransport): self
    {
        $this->EtatTransport = $EtatTransport;

        return $this;
    }

    public function getRefTransport(): ?Transport
    {
        return $this->RefTransport;
    }

    public function setRefTransport(?Transport $RefTransport): self
    {
        $this->RefTransport = $RefTransport;

        return $this;
    }

    public function getRefLogement(): ?Logement
    {
        return $this->RefLogement;
    }

    public function setRefLogement(?Logement $RefLogement): self
    {
        $this->RefLogement = $RefLogement;

        return $this;
    }

    /**
     * @return Collection<int, Activites>
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function addActivite(Activites $activite): self
    {
        if (!$this->activites->contains($activite)) {
            $this->activites[] = $activite;
            $activite->addIdActivite($this);
        }

        return $this;
    }

    public function removeActivite(Activites $activite): self
    {
        if ($this->activites->removeElement($activite)) {
            $activite->removeIdActivite($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Statut>
     */
    public function getRefStatut(): Collection
    {
        return $this->RefStatut;
    }

    public function addRefStatut(Statut $refStatut): self
    {
        if (!$this->RefStatut->contains($refStatut)) {
            $this->RefStatut[] = $refStatut;
            $refStatut->addIdStatut($this);
        }

        return $this;
    }

    public function removeRefStatut(Statut $refStatut): self
    {
        if ($this->RefStatut->removeElement($refStatut)) {
            $refStatut->removeIdStatut($this);
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom;
    }
}
