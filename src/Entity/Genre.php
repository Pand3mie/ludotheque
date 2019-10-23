<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenreRepository")
 */
class Genre
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
     * @ORM\OneToMany(targetEntity="App\Entity\Jeux", mappedBy="genre")
     */
    private $jeux_genre;

    public function __construct()
    {
        $this->jeux_genre = new ArrayCollection();
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

    /**
     * @return Collection|Jeux[]
     */
    public function getJeuxGenre(): Collection
    {
        return $this->jeux_genre;
    }

    public function addJeuxGenre(Jeux $jeuxGenre): self
    {
        if (!$this->jeux_genre->contains($jeuxGenre)) {
            $this->jeux_genre[] = $jeuxGenre;
            $jeuxGenre->setGenre($this);
        }

        return $this;
    }

    public function removeJeuxGenre(Jeux $jeuxGenre): self
    {
        if ($this->jeux_genre->contains($jeuxGenre)) {
            $this->jeux_genre->removeElement($jeuxGenre);
            // set the owning side to null (unless already changed)
            if ($jeuxGenre->getGenre() === $this) {
                $jeuxGenre->setGenre(null);
            }
        }

        return $this;
    }
}
