<?php

namespace App\Entity;

use App\Repository\StructureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StructureRepository::class)
 */
class Structure extends Member
{
    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $st_secteur;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $st_website;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $st_country_origi;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $representing;

    public function getRepresenting(): ?string
    {
        return $this->representing;
    }

    public function setRepresenting(string $representing): self
    {
        $this->representing = $representing;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStSecteur()
    {
        return $this->st_secteur;
    }

    /**
     * @return mixed
     */
    public function getStWebsite()
    {
        return $this->st_website;
    }

    /**
     * @return mixed
     */
    public function getStCountryOrigi()
    {
        return $this->st_country_origi;
    }

    /**
     * @param mixed $st_secteur
     */
    public function setStSecteur($st_secteur): void
    {
        $this->st_secteur = $st_secteur;
    }

    /**
     * @param mixed $st_website
     */
    public function setStWebsite($st_website): void
    {
        $this->st_website = $st_website;
    }

    /**
     * @param mixed $st_country_origi
     */
    public function setStCountryOrigi($st_country_origi): void
    {
        $this->st_country_origi = $st_country_origi;
    }
}
