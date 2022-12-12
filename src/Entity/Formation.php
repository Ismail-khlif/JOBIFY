<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank (message:"titre is required")]
    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[Assert\NotBlank (message:"description is required")]
    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[Assert\NotBlank (message:"prix is required")]
    #[ORM\Column]
    private ?int $prix = null;

    #[Assert\NotBlank (message:"date is required")]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_debut = null;

    #[Assert\NotBlank (message:"date is required")]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\ManyToOne(inversedBy: 'formations')]
    private ?Users $entrepreneur = null;

    #[ORM\OneToMany(mappedBy: 'formation', targetEntity: Users::class)]
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

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

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
            $candidateur->setFormation($this);
        }

        return $this;
    }

    public function removeCandidateur(Users $candidateur): self
    {
        if ($this->candidateur->removeElement($candidateur)) {
            // set the owning side to null (unless already changed)
            if ($candidateur->getFormation() === $this) {
                $candidateur->setFormation(null);
            }
        }

        return $this;
    }
}
