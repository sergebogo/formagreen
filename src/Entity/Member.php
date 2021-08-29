<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MemberRepository::class)
 */
class Member
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Subscription::class, mappedBy="member", orphanRemoval=true)
     */
    private $subscriptions;

    /**
     * @ORM\ManyToMany(targetEntity=GreenArea::class, inversedBy="members")
     */
    private $greenAreas;

    public function __construct()
    {
        $this->subscriptions = new ArrayCollection();
        $this->greenAreas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Subscription[]
     */
    public function getSubscriptions(): Collection
    {
        return $this->subscriptions;
    }

    public function addSubscription(Subscription $subscription): self
    {
        if (!$this->subscriptions->contains($subscription)) {
            $this->subscriptions[] = $subscription;
            $subscription->setMember($this);
        }

        return $this;
    }

    public function removeSubscription(Subscription $subscription): self
    {
        if ($this->subscriptions->removeElement($subscription)) {
            // set the owning side to null (unless already changed)
            if ($subscription->getMember() === $this) {
                $subscription->setMember(null);
            }
        }

        return $this;
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
        }

        return $this;
    }

    public function removeGreenArea(GreenArea $greenArea): self
    {
        $this->greenAreas->removeElement($greenArea);

        return $this;
    }
}
