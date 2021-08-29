<?php

namespace App\Entity;

use App\Repository\GreenAreaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GreenAreaRepository::class)
 */
class GreenArea
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $ga_lat;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $ga_long;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $ga_surface;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ga_details;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ga_photo;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $ga_startedAt;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $ga_finishedAt;

    /**
     * @ORM\ManyToOne(targetEntity=FormingStructure::class, inversedBy="greenAreas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formingStructure;

    /**
     * @ORM\ManyToMany(targetEntity=Member::class, mappedBy="greenAreas")
     */
    private $members;

    public function __construct()
    {
        $this->members = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormingStructure(): ?FormingStructure
    {
        return $this->formingStructure;
    }

    public function setFormingStructure(?FormingStructure $formingStructure): self
    {
        $this->formingStructure = $formingStructure;

        return $this;
    }

    /**
     * @return Collection|Member[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Member $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->addGreenArea($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->removeElement($member)) {
            $member->removeGreenArea($this);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGaLat()
    {
        return $this->ga_lat;
    }

    /**
     * @return mixed
     */
    public function getGaLong()
    {
        return $this->ga_long;
    }

    /**
     * @return mixed
     */
    public function getGaSurface()
    {
        return $this->ga_surface;
    }

    /**
     * @return mixed
     */
    public function getGaDetails()
    {
        return $this->ga_details;
    }

    /**
     * @return mixed
     */
    public function getGaPhoto()
    {
        return $this->ga_photo;
    }

    /**
     * @return mixed
     */
    public function getGaStartedAt()
    {
        return $this->ga_startedAt;
    }

    /**
     * @return mixed
     */
    public function getGaFinishedAt()
    {
        return $this->ga_finishedAt;
    }
}
