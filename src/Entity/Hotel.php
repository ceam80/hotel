<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column]
    private ?int $rooms = null;

    #[ORM\Column(length: 255)]
    private ?string $direcction = null;

    #[ORM\OneToOne(inversedBy: 'hotel', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Director $director_id = null;

    #[ORM\ManyToMany(targetEntity: Client::class, inversedBy: 'hotels')]
    private Collection $client_id;

    #[ORM\OneToMany(mappedBy: 'hotel', targetEntity: room::class, orphanRemoval: true)]
    private Collection $room_id;

    

    public function __construct()
    {
        $this->client_id = new ArrayCollection();
        $this->room_id = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getRooms(): ?int
    {
        return $this->rooms;
    }

    public function setRooms(int $rooms): self
    {
        $this->rooms = $rooms;

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

    public function getDirectorId(): ?Director
    {
        return $this->director_id;
    }

    public function setDirectorId(Director $director_id): self
    {
        $this->director_id = $director_id;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClientId(): Collection
    {
        return $this->client_id;
    }

    public function addClientId(Client $clientId): self
    {
        if (!$this->client_id->contains($clientId)) {
            $this->client_id->add($clientId);
        }

        return $this;
    }

    public function removeClientId(Client $clientId): self
    {
        $this->client_id->removeElement($clientId);

        return $this;
    }

    /**
     * @return Collection<int, room>
     */
    public function getRoom(): Collection
    {
        return $this->room_id;
    }

    public function addRoom(Room $room): self
    {
        if (!$this->room->contains($room)) {
            $this->room->add($room);
            $roomId->setHotel($this);
        }

        return $this;
    }

    public function removeRoom(Room $room): self
    {
        if ($this->room->removeElement($room)) {
            // set the owning side to null (unless already changed)
            if ($room->getHotel() === $this) {
                $room->setHotel(null);
            }
        }

        return $this;
    }

    
}
