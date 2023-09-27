<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateContrat = null;

    #[ORM\Column]
    private ?int $noImmatriculation = null;

    #[ORM\ManyToOne(inversedBy: 'idUsager')]
    #[ORM\JoinColumn(nullable: false)]
    private ?usager $idUsager = null;

    #[ORM\ManyToOne(inversedBy: 'contrats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ModeleBatterie $idModeleBatterie = null;

    #[ORM\OneToMany(mappedBy: 'contrat', targetEntity: OperationRechargement::class)]
    private Collection $operationRechargements;

    public function __construct()
    {
        $this->operationRechargements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateContrat(): ?\DateTimeInterface
    {
        return $this->dateContrat;
    }

    public function setDateContrat(\DateTimeInterface $dateContrat): static
    {
        $this->dateContrat = $dateContrat;

        return $this;
    }

    public function getNoImmatriculation(): ?int
    {
        return $this->noImmatriculation;
    }

    public function setNoImmatriculation(int $noImmatriculation): static
    {
        $this->noImmatriculation = $noImmatriculation;

        return $this;
    }

    public function getIdUsager(): ?usager
    {
        return $this->idUsager;
    }

    public function setIdUsager(?usager $idUsager): static
    {
        $this->idUsager = $idUsager;

        return $this;
    }

    public function getIdModeleBatterie(): ?ModeleBatterie
    {
        return $this->idModeleBatterie;
    }

    public function setIdModeleBatterie(?ModeleBatterie $idModeleBatterie): static
    {
        $this->idModeleBatterie = $idModeleBatterie;

        return $this;
    }

    /**
     * @return Collection<int, OperationRechargement>
     */
    public function getOperationRechargements(): Collection
    {
        return $this->operationRechargements;
    }

    public function addOperationRechargement(OperationRechargement $operationRechargement): static
    {
        if (!$this->operationRechargements->contains($operationRechargement)) {
            $this->operationRechargements->add($operationRechargement);
            $operationRechargement->setContrat($this);
        }

        return $this;
    }

    public function removeOperationRechargement(OperationRechargement $operationRechargement): static
    {
        if ($this->operationRechargements->removeElement($operationRechargement)) {
            // set the owning side to null (unless already changed)
            if ($operationRechargement->getContrat() === $this) {
                $operationRechargement->setContrat(null);
            }
        }

        return $this;
    }
}
