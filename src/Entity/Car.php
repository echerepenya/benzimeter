<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $brand;

    #[ORM\Column(type: 'string', length: 255)]
    private $model;

    #[ORM\Column(type: 'string', length: 255)]
    private $reg_number;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\OneToMany(mappedBy: 'car', targetEntity: Refuelling::class)]
    private $refuellings;

    public function __construct()
    {
        $this->refuellings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getRegNumber(): ?string
    {
        return $this->reg_number;
    }

    public function setRegNumber(string $reg_number): self
    {
        $this->reg_number = $reg_number;

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
            $refuelling->setCar($this);
        }

        return $this;
    }

    public function removeRefuelling(Refuelling $refuelling): self
    {
        if ($this->refuellings->removeElement($refuelling)) {
            // set the owning side to null (unless already changed)
            if ($refuelling->getCar() === $this) {
                $refuelling->setCar(null);
            }
        }

        return $this;
    }
}
