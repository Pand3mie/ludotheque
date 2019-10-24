<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JeuxRepository")
 */
class Jeux
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $annee;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbre_joueur_min;

        /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbre_joueur_max;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptif;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree_min;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree_max;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationalite;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Auteur", inversedBy="jeux_auteur")
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Editeur", inversedBy="jeux_editeur")
     */
    private $editeur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Image", inversedBy="jeux_image")
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Genre", inversedBy="jeux_genre")
     */
    private $genre;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Avis", inversedBy="jeux_avis")
     */
    private $avis;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Video", inversedBy="jeux_video")
     */
    private $video;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $date_maj;

    public function __construct()
    {
        $this->auteur = new ArrayCollection();
        $this->avis = new ArrayCollection();
        $this->date_maj = new \DateTime('now');
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

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(?int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getDureeMin(): ?int
    {
        return $this->duree_min;
    }

    public function setDureeMin(?int $duree_min): self
    {
        $this->duree_min = $duree_min;

        return $this;
    }

    public function getDureeMax(): ?int
    {
        return $this->duree_max;
    }

    public function setDureeMax(?int $duree_max): self
    {
        $this->duree_max = $duree_max;

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
     * @return Collection|Auteur[]
     */
    public function getAuteur(): Collection
    {
        return $this->auteur;
    }

    public function addAuteur(Auteur $auteur): self
    {
        if (!$this->auteur->contains($auteur)) {
            $this->auteur[] = $auteur;
        }

        return $this;
    }

    public function removeAuteur(Auteur $auteur): self
    {
        if ($this->auteur->contains($auteur)) {
            $this->auteur->removeElement($auteur);
        }

        return $this;
    }

    public function getEditeur(): ?Editeur
    {
        return $this->editeur;
    }

    public function setEditeur(?Editeur $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): self
    {
        if (!$this->avis->contains($avi)) {
            $this->avis[] = $avi;
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->contains($avi)) {
            $this->avis->removeElement($avi);
        }

        return $this;
    }

    public function getVideo(): ?Video
    {
        return $this->video;
    }

    public function setVideo(?Video $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getNbreJoueurMin(): ?int
    {
        return $this->nbre_joueur_min;
    }

    public function setNbreJoueurMin(?int $nbre_joueur_min): self
    {
        $this->nbre_joueur_min = $nbre_joueur_min;

        return $this;
    }

    public function getNbreJoueurMax(): ?int
    {
        return $this->nbre_joueur_max;
    }

    public function setNbreJoueurMax(?int $nbre_joueur_max): self
    {
        $this->nbre_joueur_max = $nbre_joueur_max;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function __toString() {
        return $this->nom;
    }

    public function getDateMaj(): ?\DateTimeInterface
    {
        return $this->date_maj;
    }

    public function setDateMaj(\DateTimeInterface $date_maj): self
    {
        $this->date_maj = $date_maj;

        return $this;
    }
}
