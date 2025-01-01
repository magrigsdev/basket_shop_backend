<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:'integer')]
    private ?int $id = null;


    #[ORM\Column(length: 200, nullable: true, type:'string')]
    private ?string $commentaire = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_avis = null;

    #[ORM\ManyToOne(inversedBy: 'avis')]
    private ?Client $client_id = null;

    #[ORM\ManyToOne(inversedBy: 'avis')]
    private ?Produit $produit_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId(Client $client_id): static
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getProduitId(): ?int
    {
        return $this->produit_id;
    }

    public function setProduitId(Produit $produit_id): static
    {
        $this->produit_id = $produit_id;

        return $this;
    }

    public function getDateAvis(): ?\DateTimeInterface
    {
        return $this->date_avis;
    }

    public function setDateAvis(\DateTimeInterface $date_avis): static
    {
        $this->date_avis = $date_avis;

        return $this;
    }
}
