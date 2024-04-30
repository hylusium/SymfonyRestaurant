<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantRepository::class)]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $Nom = null;

    #[ORM\Column(length: 200)]
    private ?string $Adresse = null;

    #[ORM\Column]
    private ?int $Note = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Restaurateur $IdRestaurateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): static
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->Note;
    }

    public function setNote(int $Note): static
    {
        $this->Note = $Note;

        return $this;
    }

    public function getIdRestaurateur(): ?Restaurateur
    {
        return $this->IdRestaurateur;
    }

    public function setIdRestaurateur(Restaurateur $IdRestaurateur): static
    {
        $this->IdRestaurateur = $IdRestaurateur;

        return $this;
    }
}
