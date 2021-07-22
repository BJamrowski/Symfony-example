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
     * @ORM\Column(type="string", length=40)
     */
    private $Nazwa;

    /**
     * @ORM\Column(type="integer")
     */
    private $telefon;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $miejscowosc;

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
        return $this->Nazwa;
    }

    public function setNazwa(string $Nazwa): self
    {
        $this->Nazwa = $Nazwa;

        return $this;
    }

    public function getTelefon(): ?int
    {
        return $this->telefon;
    }

    public function setTelefon(int $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getMiejscowosc(): ?string
    {
        return $this->miejscowosc;
    }

    public function setMiejscowosc(string $miejscowosc): self
    {
        $this->miejscowosc = $miejscowosc;

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
