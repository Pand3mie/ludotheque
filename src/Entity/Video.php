<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoRepository")
 */
class Video
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lien;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Jeux", mappedBy="video")
     */
    private $jeux_video;

    public function __construct()
    {
        $this->jeux_video = new ArrayCollection();
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

    public function setLien(?string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * @return Collection|Jeux[]
     */
    public function getJeuxVideo(): Collection
    {
        return $this->jeux_video;
    }

    public function addJeuxVideo(Jeux $jeuxVideo): self
    {
        if (!$this->jeux_video->contains($jeuxVideo)) {
            $this->jeux_video[] = $jeuxVideo;
            $jeuxVideo->setVideo($this);
        }

        return $this;
    }

    public function removeJeuxVideo(Jeux $jeuxVideo): self
    {
        if ($this->jeux_video->contains($jeuxVideo)) {
            $this->jeux_video->removeElement($jeuxVideo);
            // set the owning side to null (unless already changed)
            if ($jeuxVideo->getVideo() === $this) {
                $jeuxVideo->setVideo(null);
            }
        }

        return $this;
    }
}
