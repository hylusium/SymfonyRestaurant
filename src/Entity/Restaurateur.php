<?php

namespace App\Entity;

use App\Repository\RestaurateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurateurRepository::class)]
class Restaurateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $Nom = null;

    #[ORM\Column(length: 50)]
    private ?string $Login = null;

    #[ORM\Column(length: 30)]
    private ?string $Password = null;

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

    public function getLogin(): ?string
    {
        return $this->Login;
    }

    public function setLogin(string $Login): static
    {
        $this->Login = $Login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): static
    {
        $this->Password = $Password;

        return $this;
    }
}
