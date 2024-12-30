<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $commande_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $adresse_livraison_id = null;

    #[ORM\Column(length: 255)]
    private ?string $statut_livraison = null;

    #[ORM\Column(length: 255)]
    private ?string $facture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommandeId(): ?int
    {
        return $this->commande_id;
    }

    public function setCommandeId(int $commande_id): static
    {
        $this->commande_id = $commande_id;

        return $this;
    }

    public function getAdresseLivraisonId(): ?\DateTimeInterface
    {
        return $this->adresse_livraison_id;
    }

    public function setAdresseLivraisonId(\DateTimeInterface $adresse_livraison_id): static
    {
        $this->adresse_livraison_id = $adresse_livraison_id;

        return $this;
    }

    public function getStatutLivraison(): ?string
    {
        return $this->statut_livraison;
    }

    public function setStatutLivraison(string $statut_livraison): static
    {
        $this->statut_livraison = $statut_livraison;

        return $this;
    }

    public function getFacture(): ?string
    {
        return $this->facture;
    }

    public function setFacture(string $facture): static
    {
        $this->facture = $facture;

        return $this;
    }
}
