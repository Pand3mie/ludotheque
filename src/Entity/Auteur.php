<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuteurRepository")
 */
class Auteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationalite;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Jeux", mappedBy="auteur")
     */
    private $jeux_auteur;

    public function __construct()
    {
        $this->jeux_auteur = new ArrayCollection();
    }

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(?string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * @return Collection|Jeux[]
     */
    public function getJeuxAuteur(): Collection
    {
        return $this->jeux_auteur;
    }

    public function addJeuxAuteur(Jeux $jeuxAuteur): self
    {
        if (!$this->jeux_auteur->contains($jeuxAuteur)) {
            $this->jeux_auteur[] = $jeuxAuteur;
            $jeuxAuteur->addAuteur($this);
        }

        return $this;
    }

    public function removeJeuxAuteur(Jeux $jeuxAuteur): self
    {
        if ($this->jeux_auteur->contains($jeuxAuteur)) {
            $this->jeux_auteur->removeElement($jeuxAuteur);
            $jeuxAuteur->removeAuteur($this);
        }

        return $this;
    }
}
