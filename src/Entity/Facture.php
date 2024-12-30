<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $commande_id = null;

    #[ORM\Column]
    private ?int $client_id = null;

    #[ORM\Column(length: 255)]
    private ?string $montal_total = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $montant_total = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_facture = null;

    #[ORM\Column(length: 255)]
    private ?string $beneficier = null;

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

    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId(int $client_id): static
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getMontalTotal(): ?string
    {
        return $this->montal_total;
    }

    public function setMontalTotal(string $montal_total): static
    {
        $this->montal_total = $montal_total;

        return $this;
    }

    public function getMontantTotal(): ?string
    {
        return $this->montant_total;
    }

    public function setMontantTotal(string $montant_total): static
    {
        $this->montant_total = $montant_total;

        return $this;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->date_facture;
    }

    public function setDateFacture(\DateTimeInterface $date_facture): static
    {
        $this->date_facture = $date_facture;

        return $this;
    }

    public function getBeneficier(): ?string
    {
        return $this->beneficier;
    }

    public function setBeneficier(string $beneficier): static
    {
        $this->beneficier = $beneficier;

        return $this;
    }
}
