<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommandesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CommandesRepository::class)
 */
class Commandes
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cb;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fdv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $crypto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ida;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titlea;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qtya;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $price;

     /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getTitulaire(): ?string
    {
        return $this->titulaire;
    }

    public function setTitulaire(string $titulaire): self
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    public function getCb(): ?string
    {
        return $this->cb;
    }

    public function setCb(string $cb): self
    {
        $this->cb = $cb;

        return $this;
    }

    public function getFdv(): ?string
    {
        return $this->fdv;
    }

    public function setFdv(string $fdv): self
    {
        $this->fdv = $fdv;

        return $this;
    }

    public function getCrypto(): ?string
    {
        return $this->crypto;
    }

    public function setCrypto(string $crypto): self
    {
        $this->crypto = $crypto;

        return $this;
    }

    public function getIda(): ?int
    {
        return $this->ida;
    }

    public function setIda(int $ida): self
    {
        $this->ida = $ida;

        return $this;
    }

    public function getTitlea(): ?string
    {
        return $this->titlea;
    }

    public function setTitlea(string $titlea): self
    {
        $this->titlea = $titlea;

        return $this;
    }

    public function getQtya(): ?string
    {
        return $this->qtya;
    }

    public function setQtya(string $qtya): self
    {
        $this->qtya = $qtya;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }
}
