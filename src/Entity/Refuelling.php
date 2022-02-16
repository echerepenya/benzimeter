<?php

namespace App\Entity;

use App\Repository\RefuellingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RefuellingRepository::class)]
class Refuelling
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'refuellings')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\ManyToOne(targetEntity: Car::class, inversedBy: 'refuellings')]
    #[ORM\JoinColumn(nullable: false)]
    private $car;

    #[ORM\ManyToOne(targetEntity: PetrolStation::class, inversedBy: 'refuellings')]
    #[ORM\JoinColumn(nullable: false)]
    private $petrolStation;

    #[ORM\ManyToOne(targetEntity: Fuel::class, inversedBy: 'refuellings')]
    #[ORM\JoinColumn(nullable: false)]
    private $fuel;

    #[ORM\Column(type: 'decimal', precision: 6, scale: 2)]
    private $litres;

    #[ORM\Column(type: 'decimal', precision: 7, scale: 2)]
    private $cost;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private $updatedAt;

    #[ORM\ManyToOne(targetEntity: Currency::class, inversedBy: 'refuellings')]
    #[ORM\JoinColumn(nullable: false)]
    private $currency;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }

    public function getPetrolStation(): ?PetrolStation
    {
        return $this->petrolStation;
    }

    public function setPetrolStation(?PetrolStation $petrolStation): self
    {
        $this->petrolStation = $petrolStation;

        return $this;
    }

    public function getFuel(): ?Fuel
    {
        return $this->fuel;
    }

    public function setFuel(?Fuel $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getLitres(): ?string
    {
        return $this->litres;
    }

    public function setLitres(string $litres): self
    {
        $this->litres = $litres;

        return $this;
    }

    public function getCost(): ?string
    {
        return $this->cost;
    }

    public function setCost(string $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }
}
