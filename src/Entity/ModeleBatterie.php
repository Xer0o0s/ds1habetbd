<?php

namespace App\Entity;

use App\Repository\ModeleBatterieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModeleBatterieRepository::class)]
class ModeleBatterie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $capacité = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $fabricant = null;

    #[ORM\OneToMany(mappedBy: 'idModeleBatterie', targetEntity: Contrat::class, orphanRemoval: true)]
    private Collection $contrats;

    #[ORM\OneToMany(mappedBy: 'modeleBatterie', targetEntity: Supporter::class)]
    private Collection $supporters;

    public function __construct()
    {
        $this->contrats = new ArrayCollection();
        $this->supporters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapacité(): ?string
    {
        return $this->capacité;
    }

    public function setCapacité(string $capacité): static
    {
        $this->capacité = $capacité;

        return $this;
    }

    public function getFabricant(): ?string
    {
        return $this->fabricant;
    }

    public function setFabricant(string $fabricant): static
    {
        $this->fabricant = $fabricant;

        return $this;
    }

    /**
     * @return Collection<int, Contrat>
     */
    public function getContrats(): Collection
    {
        return $this->contrats;
    }

    public function addContrat(Contrat $contrat): static
    {
        if (!$this->contrats->contains($contrat)) {
            $this->contrats->add($contrat);
            $contrat->setIdModeleBatterie($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): static
    {
        if ($this->contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getIdModeleBatterie() === $this) {
                $contrat->setIdModeleBatterie(null);
            }
        }

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
            $supporter->setModeleBatterie($this);
        }

        return $this;
    }

    public function removeSupporter(Supporter $supporter): static
    {
        if ($this->supporters->removeElement($supporter)) {
            // set the owning side to null (unless already changed)
            if ($supporter->getModeleBatterie() === $this) {
                $supporter->setModeleBatterie(null);
            }
        }

        return $this;
    }
}
