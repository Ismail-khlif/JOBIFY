<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
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

    #[Assert\NotBlank (message:"date is required")]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_de_creation = null;

    #[Assert\NotBlank (message:"date is required")]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_expiration = null;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    private ?Users $entrepreneur = null;

    #[ORM\OneToMany(mappedBy: 'post', targetEntity: Users::class)]
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

    public function getDateDeCreation(): ?\DateTimeInterface
    {
        return $this->date_de_creation;
    }

    public function setDateDeCreation(\DateTimeInterface $date_de_creation): self
    {
        $this->date_de_creation = $date_de_creation;

        return $this;
    }

    public function getDateExpiration(): ?\DateTimeInterface
    {
        return $this->date_expiration;
    }

    public function setDateExpiration(\DateTimeInterface $date_expiration): self
    {
        $this->date_expiration = $date_expiration;

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
            $candidateur->setPost($this);
        }

        return $this;
    }

    public function removeCandidateur(Users $candidateur): self
    {
        if ($this->candidateur->removeElement($candidateur)) {
            // set the owning side to null (unless already changed)
            if ($candidateur->getPost() === $this) {
                $candidateur->setPost(null);
            }
        }

        return $this;
    }
}
