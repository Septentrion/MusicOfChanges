<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OpusRepository")
 */
class Opus
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
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $abstract;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ParticipatesIn", mappedBy="opus_id")
     */
    private $creators;

    public function __construct()
    {
        $this->creators = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getAbstract(): ?string
    {
        return $this->abstract;
    }

    public function setAbstract(?string $abstract): self
    {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * @return Collection|ParticipatesIn[]
     */
    public function getCreators(): Collection
    {
        return $this->creators;
    }

    public function addCreator(ParticipatesIn $creator): self
    {
        if (!$this->creators->contains($creator)) {
            $this->creators[] = $creator;
            $creator->setOpusId($this);
        }

        return $this;
    }

    public function removeCreator(ParticipatesIn $creator): self
    {
        if ($this->creators->contains($creator)) {
            $this->creators->removeElement($creator);
            // set the owning side to null (unless already changed)
            if ($creator->getOpusId() === $this) {
                $creator->setOpusId(null);
            }
        }

        return $this;
    }
}