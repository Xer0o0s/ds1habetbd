<?php

namespace App\Entity;

use App\Repository\SupporterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SupporterRepository::class)]
class Supporter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'supporters')]
    private ?ModeleBatterie $modeleBatterie = null;

    #[ORM\ManyToOne(inversedBy: 'supporters')]
    private ?TypeCharge $codeTypeCharge = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModeleBatterie(): ?ModeleBatterie
    {
        return $this->modeleBatterie;
    }

    public function setModeleBatterie(?ModeleBatterie $modeleBatterie): static
    {
        $this->modeleBatterie = $modeleBatterie;

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
}
