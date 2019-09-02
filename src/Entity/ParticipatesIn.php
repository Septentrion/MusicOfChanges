<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParticipatesInRepository")
 */
class ParticipatesIn
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artist", inversedBy="creations")
     */
    private $authorId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Opus", inversedBy="creators")
     * @ORM\JoinColumn(nullable=false)
     */
    private $opus_id;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthorId(): ?Artist
    {
        return $this->authorId;
    }

    public function setAuthorId(?Artist $authorId): self
    {
        $this->authorId = $authorId;

        return $this;
    }

    public function getOpusId(): ?Opus
    {
        return $this->opus_id;
    }

    public function setOpusId(?Opus $opus_id): self
    {
        $this->opus_id = $opus_id;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
