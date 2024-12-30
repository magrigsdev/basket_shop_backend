<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200, type: 'string')]
    private ?string $nom = null;

    #[ORM\Column(length: 255, type: 'string')]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, type: 'string')]
    private ?string $mote_de_passe = null;

    #[ORM\Column(length: 255, nullable: true, type:'string')]
    private ?string $adresse = null;

    
    #[ORM\ManyToOne(targetEntity: Roles::class, inversedBy: 'utilisateurs')]
    #[ORM\JoinColumn(name: 'roles_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?int $roles_id = null;

    #[ORM\Column(length: 255, type:'string')]
    private ?string $type_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255, type: 'string')]
    private ?string $statut = null;

    #[ORM\Column(length: 255, nullable: true, type: 'string')]
    private ?string $telephone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMoteDePasse(): ?string
    {
        return $this->mote_de_passe;
    }

    public function setMoteDePasse(string $mote_de_passe): static
    {
        $this->mote_de_passe = $mote_de_passe;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getRolesId(): ?Roles
    {
        return $this->roles_id;
    }

    public function setRolesId(?Roles $roles_id): self
    {
        $this->roles_id = $roles_id;

        return $this;
    }

    public function getTypeUtilisateur(): ?string
    {
        return $this->type_utilisateur;
    }

    public function setTypeUtilisateur(string $type_utilisateur): static
    {
        $this->type_utilisateur = $type_utilisateur;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }
}
