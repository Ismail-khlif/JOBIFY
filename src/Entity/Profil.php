<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfilRepository::class)]
class Profil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank (message:"phone is required")]
    private ?int $phone = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Users $Nom = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Users $Prenom = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Users $Username = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Users $Password = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Users $Email = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Users $Age = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getNom(): ?Users
    {
        return $this->Nom;
    }

    public function setNom(?Users $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?Users
    {
        return $this->Prenom;
    }

    public function setPrenom(?Users $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getUsername(): ?Users
    {
        return $this->Username;
    }

    public function setUsername(?Users $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

    public function getPassword(): ?Users
    {
        return $this->Password;
    }

    public function setPassword(?Users $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getEmail(): ?Users
    {
        return $this->Email;
    }

    public function setEmail(?Users $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getAge(): ?Users
    {
        return $this->Age;
    }

    public function setAge(?Users $Age): self
    {
        $this->Age = $Age;

        return $this;
    }
}
