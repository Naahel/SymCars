<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Le nom ne peut pas être vide")]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "La marque ne peut pas être vide")]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $brand = null;

    #[ORM\Column(nullable: true)]
    private ?float $mileage = null;

    #[ORM\Column]
    #[Assert\NotNull(message: "Le nombre de place ne peut pas être nul")]
    #[Assert\Positive]
    #[Assert\LessThanOrEqual(5)]
    private ?int $place = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getMileage(): ?float
    {
        return $this->mileage;
    }

    public function setMileage(?float $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getPlace(): ?int
    {
        return $this->place;
    }

    public function setPlace(int $place): static
    {
        $this->place = $place;

        return $this;
    }
}
