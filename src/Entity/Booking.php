<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Table::class, inversedBy: 'bookings')]
    private $numberPeople;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'time')]
    private $time;

    #[ORM\Column(type: 'string', length: 255)]
    private $fullName;

    #[ORM\Column(type: 'string', length: 50)]
    private $phoneNumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberPeople(): ?Table
    {
        return $this->numberPeople;
    }

    public function setNumberPeople(?Table $numberPeople): self
    {
        $this->numberPeople = $numberPeople;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(int $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
}
