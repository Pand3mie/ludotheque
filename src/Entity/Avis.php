<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvisRepository")
 */
class Avis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $avis;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Jeux", mappedBy="avis")
     */
    private $jeux_avis;

    public function __construct()
    {
        $this->jeux_avis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(?string $avis): self
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * @return Collection|Jeux[]
     */
    public function getJeuxAvis(): Collection
    {
        return $this->jeux_avis;
    }

    public function addJeuxAvi(Jeux $jeuxAvi): self
    {
        if (!$this->jeux_avis->contains($jeuxAvi)) {
            $this->jeux_avis[] = $jeuxAvi;
            $jeuxAvi->addAvi($this);
        }

        return $this;
    }

    public function removeJeuxAvi(Jeux $jeuxAvi): self
    {
        if ($this->jeux_avis->contains($jeuxAvi)) {
            $this->jeux_avis->removeElement($jeuxAvi);
            $jeuxAvi->removeAvi($this);
        }

        return $this;
    }
}
