<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:'integer')]
    private ?int $id = null;

    #[ORM\Column(length: 255, type: 'string')]
    private ?string $nom = null;

    #[ORM\Column(length: 255, type: 'string')]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix = null;


    #[ORM\ManyToOne(targetEntity: Taille::class, inversedBy: 'taille')]
    #[ORM\JoinColumn(name: 'taille_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?int $taille_id = null;

    #[ORM\Column(length: 255, nullable: true, type: 'string')]
    private ?string $couleur = null;

    #[ORM\ManyToOne(targetEntity: Marques::class, inversedBy: 'marques')]
    #[ORM\JoinColumn(name: 'marque_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?int $marque_id = null;

    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'categorie')]
    #[ORM\JoinColumn(name: 'categories_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?int $categories_id = null;

    #[ORM\ManyToOne(targetEntity: Genre::class, inversedBy: 'genre')]
    #[ORM\JoinColumn(name: 'genre_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?int $genre_id = null;
    /**
     * @var Collection<int, Avis>
     */
    #[ORM\OneToMany(targetEntity: Avis::class, mappedBy: 'produit_id')]
    private Collection $avis;


    public function __construct()
    {
        $this->avis = new ArrayCollection();
        $this->id_genre = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCategoriesId(): ?Categorie
    {
        return $this->categories_id;
    }

    public function setCategoriesId(?Categorie $categories_id): self
    {
        $this->categories_id = $categories_id;

        return $this;
    }

    public function getTaille(): ?Taille
    {
        return $this->taille_id;
    }

    public function setTaille(?Taille $taille_id): self
    {
        $this->taille_id = $taille_id;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getMarqueId(): ?Marques
    {
        return $this->marque_id;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre_id;
    }

    public function setGenre(?Genre $genre_id): self
    {
        $this->genre_id = $genre_id;

        return $this;
    }

    public function setMarqueId(?Marques $marque_id): self
    {
        $this->marque_id = $marque_id;

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    
    
}
