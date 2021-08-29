<?php

namespace App\Entity;

use App\Repository\FormingStructureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormingStructureRepository::class)
 */
class FormingStructure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=GreenArea::class, mappedBy="formingStructure", orphanRemoval=true)
     */
    private $greenAreas;

    public function __construct()
    {
        $this->greenAreas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return Collection|GreenArea[]
     */
    public function getGreenAreas(): Collection
    {
        return $this->greenAreas;
    }

    public function addGreenArea(GreenArea $greenArea): self
    {
        if (!$this->greenAreas->contains($greenArea)) {
            $this->greenAreas[] = $greenArea;
            $greenArea->setFormingStructure($this);
        }

        return $this;
    }

    public function removeGreenArea(GreenArea $greenArea): self
    {
        if ($this->greenAreas->removeElement($greenArea)) {
            // set the owning side to null (unless already changed)
            if ($greenArea->getFormingStructure() === $this) {
                $greenArea->setFormingStructure(null);
            }
        }

        return $this;
    }
}
