<?php

namespace App\Entity;

use App\Repository\SubscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubscriptionRepository::class)
 */
class Subscription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sb_montant;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sb_start;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sb_end;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sb_createdAt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sb_isValid;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $sb_method;

    /**
     * @ORM\ManyToMany(targetEntity=Partnership::class, inversedBy="subscriptions")
     */
    private $partnerships;

    /**
     * @ORM\ManyToOne(targetEntity=Member::class, inversedBy="subscriptions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $member;

    public function __construct()
    {
        $this->partnerships = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSbMethod(): ?string
    {
        return $this->sb_method;
    }

    public function setSbMethod(?string $method): self
    {
        $this->sb_method = $method;

        return $this;
    }

    /**
     * @return Collection|Partnership[]
     */
    public function getPartnerships(): Collection
    {
        return $this->partnerships;
    }

    public function addPartnership(Partnership $partnership): self
    {
        if (!$this->partnerships->contains($partnership)) {
            $this->partnerships[] = $partnership;
        }

        return $this;
    }

    public function removePartnership(Partnership $partnership): self
    {
        $this->partnerships->removeElement($partnership);

        return $this;
    }

    public function getMember(): ?Member
    {
        return $this->member;
    }

    public function setMember(?Member $member): self
    {
        $this->member = $member;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSbMontant()
    {
        return $this->sb_montant;
    }

    /**
     * @return mixed
     */
    public function getSbStart()
    {
        return $this->sb_start;
    }

    /**
     * @return mixed
     */
    public function getSbEnd()
    {
        return $this->sb_end;
    }

    /**
     * @return mixed
     */
    public function getSbCreatedAt()
    {
        return $this->sb_createdAt;
    }

    /**
     * @return mixed
     */
    public function getSbIsValid()
    {
        return $this->sb_isValid;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $sb_montant
     */
    public function setSbMontant($sb_montant): void
    {
        $this->sb_montant = $sb_montant;
    }

    /**
     * @param mixed $sb_start
     */
    public function setSbStart($sb_start): void
    {
        $this->sb_start = $sb_start;
    }

    /**
     * @param mixed $sb_end
     */
    public function setSbEnd($sb_end): void
    {
        $this->sb_end = $sb_end;
    }

    /**
     * @param mixed $sb_createdAt
     */
    public function setSbCreatedAt($sb_createdAt): void
    {
        $this->sb_createdAt = $sb_createdAt;
    }

    /**
     * @param mixed $sb_isValid
     */
    public function setSbIsValid($sb_isValid): void
    {
        $this->sb_isValid = $sb_isValid;
    }

    /**
     * @param mixed $partnerships
     */
    public function setPartnerships($partnerships): void
    {
        $this->partnerships = $partnerships;
    }
}
