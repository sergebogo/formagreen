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
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $fs_nom;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $fs_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $fs_adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fs_email;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $fs_phone;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $fs_representing_name;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $fs_createdAt;

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
        return $this->fs_createdAt;
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

    /**
     * @return mixed
     */
    public function getFsNom()
    {
        return $this->fs_nom;
    }

    /**
     * @return mixed
     */
    public function getFsType()
    {
        return $this->fs_type;
    }

    /**
     * @return mixed
     */
    public function getFsAdresse()
    {
        return $this->fs_adresse;
    }

    /**
     * @return mixed
     */
    public function getFsEmail()
    {
        return $this->fs_email;
    }

    /**
     * @return mixed
     */
    public function getFsPhone()
    {
        return $this->fs_phone;
    }

    /**
     * @return mixed
     */
    public function getFsRepresentingName()
    {
        return $this->fs_representing_name;
    }

    /**
     * @return mixed
     */
    public function getFsCreatedAt()
    {
        return $this->fs_createdAt;
    }
}
