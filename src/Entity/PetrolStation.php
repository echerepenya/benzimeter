<?php

namespace App\Entity;

use App\Repository\PetrolStationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PetrolStationRepository::class)]
class PetrolStation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pictureFilename;

    #[ORM\OneToMany(mappedBy: 'petrolStation', targetEntity: Refuelling::class)]
    private $refuellings;

    public function __construct()
    {
        $this->refuellings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPictureFilename(): ?string
    {
        return $this->pictureFilename;
    }

    public function setPictureFilename(?string $pictureFilename): self
    {
        $this->pictureFilename = $pictureFilename;

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
            $refuelling->setPetrolStation($this);
        }

        return $this;
    }

    public function removeRefuelling(Refuelling $refuelling): self
    {
        if ($this->refuellings->removeElement($refuelling)) {
            // set the owning side to null (unless already changed)
            if ($refuelling->getPetrolStation() === $this) {
                $refuelling->setPetrolStation(null);
            }
        }

        return $this;
    }
}
