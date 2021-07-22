<?php

namespace App\Entity;

use App\Repository\AutoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AutoRepository::class)
 */
class Auto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Marka;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity=Salon::class, inversedBy="auta")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSalon;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarka(): ?string
    {
        return $this->Marka;
    }

    public function setMarka(string $Marka): self
    {
        $this->Marka = $Marka;

        return $this;
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

    public function getIdSalon(): ?Salon
    {
        return $this->idSalon;
    }

    public function setIdSalon(?Salon $idSalon): self
    {
        $this->idSalon = $idSalon;

        return $this;
    }
}
