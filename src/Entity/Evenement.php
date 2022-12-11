<?php

namespace App\Entity;

use App\Repository\EvenmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenmentRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    #[ORM\ManyToOne(inversedBy: 'evenements')]
    private ?Users $entrepreneur = null;

    #[ORM\OneToMany(mappedBy: 'evenement', targetEntity: Users::class)]
    private Collection $candidateur;

    public function __construct()
    {
        $this->candidateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getEntrepreneur(): ?Users
    {
        return $this->entrepreneur;
    }

    public function setEntrepreneur(?Users $entrepreneur): self
    {
        $this->entrepreneur = $entrepreneur;

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getCandidateur(): Collection
    {
        return $this->candidateur;
    }

    public function addCandidateur(Users $candidateur): self
    {
        if (!$this->candidateur->contains($candidateur)) {
            $this->candidateur->add($candidateur);
            $candidateur->setEvenement($this);
        }

        return $this;
    }

    public function removeCandidateur(Users $candidateur): self
    {
        if ($this->candidateur->removeElement($candidateur)) {
            // set the owning side to null (unless already changed)
            if ($candidateur->getEvenement() === $this) {
                $candidateur->setEvenement(null);
            }
        }

        return $this;
    }
}
