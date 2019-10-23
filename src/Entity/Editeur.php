<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EditeurRepository")
 */
class Editeur
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
    private $nationalite;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Jeux", mappedBy="editeur")
     */
    private $jeux_editeur;

    public function __construct()
    {
        $this->jeux_editeur = new ArrayCollection();
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
    public function getJeuxEditeur(): Collection
    {
        return $this->jeux_editeur;
    }

    public function addJeuxEditeur(Jeux $jeuxEditeur): self
    {
        if (!$this->jeux_editeur->contains($jeuxEditeur)) {
            $this->jeux_editeur[] = $jeuxEditeur;
            $jeuxEditeur->setEditeur($this);
        }

        return $this;
    }

    public function removeJeuxEditeur(Jeux $jeuxEditeur): self
    {
        if ($this->jeux_editeur->contains($jeuxEditeur)) {
            $this->jeux_editeur->removeElement($jeuxEditeur);
            // set the owning side to null (unless already changed)
            if ($jeuxEditeur->getEditeur() === $this) {
                $jeuxEditeur->setEditeur(null);
            }
        }

        return $this;
    }
}
