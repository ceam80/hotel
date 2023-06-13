<?php

namespace App\Entity;

use App\Repository\DirectorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DirectorRepository::class)]
class Director
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $id_card = null;

    #[ORM\Column(length: 255)]
    private ?string $fullname = null;

    #[ORM\OneToOne(mappedBy: 'director_id', cascade: ['persist', 'remove'])]
    private ?Hotel $hotel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdcard(): ?string
    {
        return $this->id_card;
    }

    public function setIdcard(string $id_card): self
    {
        $this->id_card = $id_card;

        return $this;
    }

    public function getfullname(): ?string
    {
        return $this->fullname;
    }

    public function setfullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(Hotel $hotel): self
    {
        // set the owning side of the relation if necessary
        if ($hotel->getDirectorId() !== $this) {
            $hotel->setDirectorId($this);
        }

        $this->hotel = $hotel;

        return $this;
    }
}
