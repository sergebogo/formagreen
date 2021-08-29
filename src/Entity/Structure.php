<?php

namespace App\Entity;

use App\Repository\StructureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StructureRepository::class)
 */
class Structure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $representing;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepresenting(): ?string
    {
        return $this->representing;
    }

    public function setRepresenting(string $representing): self
    {
        $this->representing = $representing;

        return $this;
    }
}
