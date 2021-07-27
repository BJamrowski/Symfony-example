<?php

namespace App\Entity;

use App\Repository\SellRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SellRepository::class)
 */
class Sell
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $sellDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paymentMethod;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\OneToOne(targetEntity=Car::class, inversedBy="sell", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $car;

    /**
     * @ORM\Column(type="integer")
     */
    private $phoneNumber;

    /**
     * @ORM\OneToOne(targetEntity=SalesDoc::class, mappedBy="Sell", cascade={"persist", "remove"})
     */
    private $salesDoc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSellDate(): ?\DateTimeInterface
    {
        return $this->sellDate;
    }

    public function setSellDate(\DateTimeInterface $sellDate): self
    {
        $this->sellDate = $sellDate;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(Car $car): self
    {
        $this->car = $car;

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

    public function getSalesDoc(): ?SalesDoc
    {
        return $this->salesDoc;
    }

    public function setSalesDoc(SalesDoc $salesDoc): self
    {
        // set the owning side of the relation if necessary
        if ($salesDoc->getSell() !== $this) {
            $salesDoc->setSell($this);
        }

        $this->salesDoc = $salesDoc;

        return $this;
    }
}
