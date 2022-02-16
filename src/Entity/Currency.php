<?php

namespace App\Entity;

use App\Repository\CurrencyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurrencyRepository::class)]
class Currency
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 6)]
    private $isoCode;

    #[ORM\OneToMany(mappedBy: 'currency', targetEntity: Refuelling::class)]
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

    public function getIsoCode(): ?string
    {
        return $this->isoCode;
    }

    public function setIsoCode(string $isoCode): self
    {
        $this->isoCode = $isoCode;

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
            $refuelling->setCurrency($this);
        }

        return $this;
    }

    public function removeRefuelling(Refuelling $refuelling): self
    {
        if ($this->refuellings->removeElement($refuelling)) {
            // set the owning side to null (unless already changed)
            if ($refuelling->getCurrency() === $this) {
                $refuelling->setCurrency(null);
            }
        }

        return $this;
    }
}
