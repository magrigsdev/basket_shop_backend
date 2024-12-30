<?php

namespace App\Entity;

use App\Repository\ReductionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReductionRepository::class)]
class Reduction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $pourcentage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $data_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_fin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPourcentage(): ?string
    {
        return $this->pourcentage;
    }

    public function setPourcentage(?string $pourcentage): static
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    public function getDataDebut(): ?\DateTimeInterface
    {
        return $this->data_debut;
    }

    public function setDataDebut(\DateTimeInterface $data_debut): static
    {
        $this->data_debut = $data_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): static
    {
        $this->date_fin = $date_fin;

        return $this;
    }
}
