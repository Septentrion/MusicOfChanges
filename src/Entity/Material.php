<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaterialRepository")
 */
class Material
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
    private $source;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $mimeType;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $resource;

    /**
     * @ORM\Column(type="boolean")
     */
    private $link;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Opus", inversedBy="recordedBy", cascade={"persist"})
     */
    private $records;

    public function __construct()
    {
        $this->records = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    public function setMimeType(string $mimeType): self
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    public function getResource(): ?string
    {
        return $this->resource;
    }

    public function setResource(string $resource): self
    {
        $this->resource = $resource;

        return $this;
    }

    public function getLink(): ?bool
    {
        return $this->link;
    }

    public function setLink(bool $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection|Opus[]
     */
    public function getRecords(): Collection
    {
        return $this->records;
    }

    public function addRecord(Opus $record): self
    {
        if (!$this->records->contains($record)) {
            $this->records[] = $record;
        }

        return $this;
    }

    public function removeRecord(Opus $record): self
    {
        if ($this->records->contains($record)) {
            $this->records->removeElement($record);
        }

        return $this;
    }

        public function __toString()
        {
          return $this->source;
        }
}
