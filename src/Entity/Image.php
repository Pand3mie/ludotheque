<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Jeux", mappedBy="image")
     */
    private $jeux_image;

    public function __construct()
    {
        $this->jeux_image = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * @return Collection|Jeux[]
     */
    public function getJeuxImage(): Collection
    {
        return $this->jeux_image;
    }

    public function addJeuxImage(Jeux $jeuxImage): self
    {
        if (!$this->jeux_image->contains($jeuxImage)) {
            $this->jeux_image[] = $jeuxImage;
            $jeuxImage->setImage($this);
        }

        return $this;
    }

    public function removeJeuxImage(Jeux $jeuxImage): self
    {
        if ($this->jeux_image->contains($jeuxImage)) {
            $this->jeux_image->removeElement($jeuxImage);
            // set the owning side to null (unless already changed)
            if ($jeuxImage->getImage() === $this) {
                $jeuxImage->setImage(null);
            }
        }

        return $this;
    }
}
