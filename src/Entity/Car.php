<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
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
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity=CarShowroom::class, inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $carShowroom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mark;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="float")
     */
    private $mileage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="float")
     */
    private $Price;

    /**
     * @ORM\OneToOne(targetEntity=Sell::class, mappedBy="car", cascade={"persist", "remove"})
     */
    private $sell;

    /**
     * @ORM\Column(type="boolean")
     */
    private $availability;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getCarShowroom(): ?CarShowroom
    {
        return $this->carShowroom;
    }

    public function setCarShowroom(?CarShowroom $carShowroom): self
    {
        $this->carShowroom = $carShowroom;

        return $this;
    }

    public function getMark(): ?string
    {
        return $this->mark;
    }

    public function setMark(string $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(?\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }


    public function getMileage(): ?float
    {
        return $this->mileage;
    }

    public function setMileage(float $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getSell(): ?Sell
    {
        return $this->sell;
    }

    public function setSell(Sell $sell): self
    {
        // set the owning side of the relation if necessary
        if ($sell->getCar() !== $this) {
            $sell->setCar($this);
        }

        $this->sell = $sell;

        return $this;
    }

    public function getAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(bool $availability): self
    {
        $this->availability = $availability;

        return $this;
    }
}
