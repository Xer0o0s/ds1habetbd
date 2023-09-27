<?php

namespace App\Entity;

use App\Repository\UsagerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsagerRepository::class)]
class Usager
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codePostal = null;

    #[ORM\Column]
    private ?int $telFixe = null;

    #[ORM\Column]
    private ?int $telMobile = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $mail = null;

    #[ORM\OneToMany(mappedBy: 'idUsager', targetEntity: Contrat::class, orphanRemoval: true)]
    private Collection $idModelebatterie;

    public function __construct()
    {
        $this->idModelebatterie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getTelFixe(): ?int
    {
        return $this->telFixe;
    }

    public function setTelFixe(int $telFixe): static
    {
        $this->telFixe = $telFixe;

        return $this;
    }

    public function getTelMobile(): ?int
    {
        return $this->telMobile;
    }

    public function setTelMobile(int $telMobile): static
    {
        $this->telMobile = $telMobile;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return Collection<int, Contrat>
     */
    public function getIdModelebatterie(): Collection
    {
        return $this->idModelebatterie;
    }

    public function addIdModelebatterie(Contrat $idModelebatterie): static
    {
        if (!$this->idModelebatterie->contains($idModelebatterie)) {
            $this->idModelebatterie->add($idModelebatterie);
            $idModelebatterie->setIdUsager($this);
        }

        return $this;
    }

    public function removeIdModelebatterie(Contrat $idModelebatterie): static
    {
        if ($this->idModelebatterie->removeElement($idModelebatterie)) {
            // set the owning side to null (unless already changed)
            if ($idModelebatterie->getIdUsager() === $this) {
                $idModelebatterie->setIdUsager(null);
            }
        }

        return $this;
    }
}
