<?php

namespace App\Entity;

use App\Entity\Utilisateur;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\RolesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: RolesRepository::class)]
class Roles
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:'integer')]
    private ?int $id = null;

    #[ORM\Column(length: 200, type: 'string')]
    private ?string $nom = null;

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

    #[ORM\OneToMany(mappedBy: 'role', targetEntity: Utilisateur::class)]
    private Collection $utilisateurs;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
    }

    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }


}
