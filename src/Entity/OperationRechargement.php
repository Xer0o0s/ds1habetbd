<?php

namespace App\Entity;

use App\Repository\OperationRechargementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OperationRechargementRepository::class)]
class OperationRechargement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numOperation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateHeureDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateHeureFin = null;

    #[ORM\Column]
    private ?int $nbKwHeures = null;

    #[ORM\ManyToOne(inversedBy: 'operationRechargements')]
    private ?Contrat $contrat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumOperation(): ?int
    {
        return $this->numOperation;
    }

    public function setNumOperation(int $numOperation): static
    {
        $this->numOperation = $numOperation;

        return $this;
    }

    public function getDateHeureDebut(): ?\DateTimeInterface
    {
        return $this->dateHeureDebut;
    }

    public function setDateHeureDebut(\DateTimeInterface $dateHeureDebut): static
    {
        $this->dateHeureDebut = $dateHeureDebut;

        return $this;
    }

    public function getDateHeureFin(): ?\DateTimeInterface
    {
        return $this->dateHeureFin;
    }

    public function setDateHeureFin(\DateTimeInterface $dateHeureFin): static
    {
        $this->dateHeureFin = $dateHeureFin;

        return $this;
    }

    public function getNbKwHeures(): ?int
    {
        return $this->nbKwHeures;
    }

    public function setNbKwHeures(int $nbKwHeures): static
    {
        $this->nbKwHeures = $nbKwHeures;

        return $this;
    }

    public function getContrat(): ?Contrat
    {
        return $this->contrat;
    }

    public function setContrat(?Contrat $contrat): static
    {
        $this->contrat = $contrat;

        return $this;
    }
}
