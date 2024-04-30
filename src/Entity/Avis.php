<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500)]
    private ?string $Commentaire = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Restaurant $IdRestaurant = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $IdClient = null;

    #[ORM\Column]
    private ?int $note = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(string $Commentaire): static
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }

    public function getIdRestaurant(): ?Restaurant
    {
        return $this->IdRestaurant;
    }

    public function setIdRestaurant(Restaurant $IdRestaurant): static
    {
        $this->IdRestaurant = $IdRestaurant;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->IdClient;
    }

    public function setIdClient(Client $IdClient): static
    {
        $this->IdClient = $IdClient;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }
}
