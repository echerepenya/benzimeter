<?php

namespace App\Entity;

use App\Repository\FuelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FuelRepository::class)]
class Fuel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $type;

    #[ORM\OneToMany(mappedBy: 'fuel', targetEntity: Car::class)]
    private $cars;

    #[ORM\OneToMany(mappedBy: 'fuel', targetEntity: Refuelling::class)]
    private $refuellings;

    public function __construct()
    {
        $this->cars = new ArrayCollection();
        $this->refuellings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Car[]
     */
    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function addCar(Car $car): self
    {
        if (!$this->cars->contains($car)) {
            $this->cars[] = $car;
            $car->setFuel($this);
        }

        return $this;
    }

    public function removeCar(Car $car): self
    {
        if ($this->cars->removeElement($car)) {
            // set the owning side to null (unless already changed)
            if ($car->getFuel() === $this) {
                $car->setFuel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Refuelling[]
     */
    public function getRefuellings(): Collection
    {
        return $this->refuellings;
    }

    public function addRefuelling(Refuelling $refuelling): self
    {
        if (!$this->refuellings->contains($refuelling)) {
            $this->refuellings[] = $refuelling;
            $refuelling->setFuel($this);
        }

        return $this;
    }

    public function removeRefuelling(Refuelling $refuelling): self
    {
        if ($this->refuellings->removeElement($refuelling)) {
            // set the owning side to null (unless already changed)
            if ($refuelling->getFuel() === $this) {
                $refuelling->setFuel(null);
            }
        }

        return $this;
    }
}
