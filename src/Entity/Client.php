<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $id_card = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $direcction = null;

    #[ORM\ManyToMany(targetEntity: Hotel::class, mappedBy: 'client_id')]
    private Collection $hotels;

    public function __construct()
    {
        $this->hotels = new ArrayCollection();
    }

    

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCard(): ?string
    {
        return $this->id_card;
    }

    public function setIdCard(string $id_card): self
    {
        $this->id_card = $id_card;

        return $this;
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

    public function getDirecction(): ?string
    {
        return $this->direcction;
    }

    public function setDirecction(string $direcction): self
    {
        $this->direcction = $direcction;

        return $this;
    }

    /**
     * @return Collection<int, Hotel>
     */
    public function getHotels(): Collection
    {
        return $this->hotels;
    }

    public function addHotel(Hotel $hotel): self
    {
        if (!$this->hotels->contains($hotel)) {
            $this->hotels->add($hotel);
            $hotel->addClientId($this);
        }

        return $this;
    }

    public function removeHotel(Hotel $hotel): self
    {
        if ($this->hotels->removeElement($hotel)) {
            $hotel->removeClientId($this);
        }

        return $this;
    }



}
