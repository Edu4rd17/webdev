<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $tableNumber;

    #[ORM\Column(type: 'integer')]
    private $tableCapacity;

    #[ORM\ManyToOne(targetEntity: TableStatus::class, inversedBy: 'reservations')]
    private $tableStatus;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTableNumber(): ?int
    {
        return $this->tableNumber;
    }

    public function setTableNumber(int $tableNumber): self
    {
        $this->tableNumber = $tableNumber;

        return $this;
    }

    public function getTableCapacity(): ?int
    {
        return $this->tableCapacity;
    }

    public function setTableCapacity(int $tableCapacity): self
    {
        $this->tableCapacity = $tableCapacity;

        return $this;
    }

    public function getTableStatus(): ?TableStatus
    {
        return $this->tableStatus;
    }

    public function setTableStatus(?TableStatus $tableStatus): self
    {
        $this->tableStatus = $tableStatus;

        return $this;
    }
}
