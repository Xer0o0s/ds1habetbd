<?php

namespace App\Entity;

use App\Repository\TypeChargeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeChargeRepository::class)]
class TypeCharge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codeTypeCharge = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $libelleTypeCharge = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $puissanceTypeCharge = null;

    #[ORM\OneToMany(mappedBy: 'codeTypeCharge', targetEntity: Supporter::class)]
    private Collection $supporters;

    #[ORM\OneToMany(mappedBy: 'codeTypeCharge', targetEntity: Borne::class)]
    private Collection $bornes;

    public function __construct()
    {
        $this->supporters = new ArrayCollection();
        $this->bornes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeTypeCharge(): ?string
    {
        return $this->codeTypeCharge;
    }

    public function setCodeTypeCharge(string $codeTypeCharge): static
    {
        $this->codeTypeCharge = $codeTypeCharge;

        return $this;
    }

    public function getLibelleTypeCharge(): ?string
    {
        return $this->libelleTypeCharge;
    }

    public function setLibelleTypeCharge(string $libelleTypeCharge): static
    {
        $this->libelleTypeCharge = $libelleTypeCharge;

        return $this;
    }

    public function getPuissanceTypeCharge(): ?string
    {
        return $this->puissanceTypeCharge;
    }

    public function setPuissanceTypeCharge(string $puissanceTypeCharge): static
    {
        $this->puissanceTypeCharge = $puissanceTypeCharge;

        return $this;
    }

    /**
     * @return Collection<int, Supporter>
     */
    public function getSupporters(): Collection
    {
        return $this->supporters;
    }

    public function addSupporter(Supporter $supporter): static
    {
        if (!$this->supporters->contains($supporter)) {
            $this->supporters->add($supporter);
            $supporter->setCodeTypeCharge($this);
        }

        return $this;
    }

    public function removeSupporter(Supporter $supporter): static
    {
        if ($this->supporters->removeElement($supporter)) {
            // set the owning side to null (unless already changed)
            if ($supporter->getCodeTypeCharge() === $this) {
                $supporter->setCodeTypeCharge(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Borne>
     */
    public function getBornes(): Collection
    {
        return $this->bornes;
    }

    public function addBorne(Borne $borne): static
    {
        if (!$this->bornes->contains($borne)) {
            $this->bornes->add($borne);
            $borne->setCodeTypeCharge($this);
        }

        return $this;
    }

    public function removeBorne(Borne $borne): static
    {
        if ($this->bornes->removeElement($borne)) {
            // set the owning side to null (unless already changed)
            if ($borne->getCodeTypeCharge() === $this) {
                $borne->setCodeTypeCharge(null);
            }
        }

        return $this;
    }
}
