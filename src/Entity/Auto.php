<?php

namespace App\Entity;

use App\Repository\AutoRepository;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\ManyToOne(targetEntity=Salon::class, inversedBy="auta")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSalon;

    public function __construct(){
        $this->idSalon = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $marka;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $typNadwozia;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $typSilnika;

    /**
     * @ORM\Column(type="smallint")
     */
    private $iloscDrzwi;

    /**
     * @ORM\Column(type="float")
     */
    private $cena;



    public function getId(): ?int
    {
        return $this->id;
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

    public function getMarka(): ?string
    {
        return $this->marka;
    }

    public function setMarka(string $marka): self
    {
        $this->marka = $marka;

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

    public function getTypNadwozia(): ?string
    {
        return $this->typNadwozia;
    }

    public function setTypNadwozia(string $typNadwozia): self
    {
        $this->typNadwozia = $typNadwozia;

        return $this;
    }

    public function getTypSilnika(): ?string
    {
        return $this->typSilnika;
    }

    public function setTypSilnika(string $typSilnika): self
    {
        $this->typSilnika = $typSilnika;

        return $this;
    }

    public function getIloscDrzwi(): ?int
    {
        return $this->iloscDrzwi;
    }

    public function setIloscDrzwi(int $iloscDrzwi): self
    {
        $this->iloscDrzwi = $iloscDrzwi;

        return $this;
    }

    public function getCena(): ?float
    {
        return $this->cena;
    }

    public function setCena(float $cena): self
    {
        $this->cena = $cena;

        return $this;
    }
}
