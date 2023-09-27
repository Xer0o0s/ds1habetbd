<?php

namespace App\Entity;

use App\Repository\BorneRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BorneRepository::class)]
class Borne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateMiseEnService = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDerniereRevision = null;

    #[ORM\ManyToOne(inversedBy: 'bornes')]
    private ?TypeCharge $codeTypeCharge = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?station $station = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateMiseEnService(): ?\DateTimeInterface
    {
        return $this->dateMiseEnService;
    }

    public function setDateMiseEnService(\DateTimeInterface $dateMiseEnService): static
    {
        $this->dateMiseEnService = $dateMiseEnService;

        return $this;
    }

    public function getDateDerniereRevision(): ?\DateTimeInterface
    {
        return $this->dateDerniereRevision;
    }

    public function setDateDerniereRevision(\DateTimeInterface $dateDerniereRevision): static
    {
        $this->dateDerniereRevision = $dateDerniereRevision;

        return $this;
    }

    public function getCodeTypeCharge(): ?TypeCharge
    {
        return $this->codeTypeCharge;
    }

    public function setCodeTypeCharge(?TypeCharge $codeTypeCharge): static
    {
        $this->codeTypeCharge = $codeTypeCharge;

        return $this;
    }

    public function getStation(): ?station
    {
        return $this->station;
    }

    public function setStation(?station $station): static
    {
        $this->station = $station;

        return $this;
    }
}
