<?php

namespace App\Entity;

use App\Repository\SalonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalonRepository::class)
 */
class Salon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nazwa;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $miasto;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $wlasciciel;

    /**
     * @ORM\Column(type="integer")
     */
    private $numerTelefonu;

    /**
     * @ORM\OneToMany(targetEntity=Auto::class, mappedBy="idSalon", orphanRemoval=true)
     */
    private $auta;

    public function __construct()
    {
        $this->auta = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwa(): ?string
    {
        return $this->nazwa;
    }

    public function setNazwa(string $nazwa): self
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    public function getMiasto(): ?string
    {
        return $this->miasto;
    }

    public function setMiasto(string $miasto): self
    {
        $this->miasto = $miasto;

        return $this;
    }

    public function getWlasciciel(): ?string
    {
        return $this->wlasciciel;
    }

    public function setWlasciciel(string $wlasciciel): self
    {
        $this->wlasciciel = $wlasciciel;

        return $this;
    }

    public function getNumerTelefonu(): ?int
    {
        return $this->numerTelefonu;
    }

    public function setNumerTelefonu(int $numerTelefonu): self
    {
        $this->numerTelefonu = $numerTelefonu;

        return $this;
    }

    /**
     * @return Collection|Auto[]
     */
    public function getAuta(): Collection
    {
        return $this->auta;
    }

    public function addAutum(Auto $autum): self
    {
        if (!$this->auta->contains($autum)) {
            $this->auta[] = $autum;
            $autum->setIdSalon($this);
        }

        return $this;
    }

    public function removeAutum(Auto $autum): self
    {
        if ($this->auta->removeElement($autum)) {
            // set the owning side to null (unless already changed)
            if ($autum->getIdSalon() === $this) {
                $autum->setIdSalon(null);
            }
        }

        return $this;
    }
}
