<?php

namespace App\Entity;

use App\Repository\CheckoutRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CheckoutRepository::class)]
class Checkout
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $accountHolderName;

    #[ORM\Column(type: 'string', length: 255)]
    private $cardNumber;

    #[ORM\Column(type: 'date')]
    private $expiryDate;

    #[ORM\Column(type: 'integer')]
    private $securityCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccountHolderName(): ?string
    {
        return $this->accountHolderName;
    }

    public function setAccountHolderName(string $accountHolderName): self
    {
        $this->accountHolderName = $accountHolderName;

        return $this;
    }

    public function getCardNumber(): ?int
    {
        return $this->cardNumber;
    }

    public function setCardNumber(int $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    public function getExpiryDate(): ?\DateTimeInterface
    {
        return $this->expiryDate;
    }

    public function setExpiryDate(\DateTimeInterface $expiryDate): self
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    public function getSecurityCode(): ?int
    {
        return $this->securityCode;
    }

    public function setSecurityCode(int $securityCode): self
    {
        $this->securityCode = $securityCode;

        return $this;
    }
}
