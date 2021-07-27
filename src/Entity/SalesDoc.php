<?php

namespace App\Entity;

use App\Repository\SalesDocRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalesDocRepository::class)
 */
class SalesDoc
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salesDocNumber;

    /**
     * @ORM\OneToOne(targetEntity=Sell::class, inversedBy="salesDoc", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Sell;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateSalesDoc;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalesDocNumber(): ?string
    {
        return $this->salesDocNumber;
    }

    public function setSalesDocNumber(string $salesDocNumber): self
    {
        $this->salesDocNumber = $salesDocNumber;

        return $this;
    }

    public function getSell(): ?Sell
    {
        return $this->Sell;
    }

    public function setSell(Sell $Sell): self
    {
        $this->Sell = $Sell;

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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getDateSalesDoc(): ?\DateTimeInterface
    {
        return $this->dateSalesDoc;
    }

    public function setDateSalesDoc(\DateTimeInterface $dateSalesDoc): self
    {
        $this->dateSalesDoc = $dateSalesDoc;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
