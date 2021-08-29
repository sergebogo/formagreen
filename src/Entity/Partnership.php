<?php

namespace App\Entity;

use App\Repository\PartnershipRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartnershipRepository::class)
 */
class Partnership
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
    private $ps_shop_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $ps_shop_addr;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $ps_shop_category;

    /**
     * @ORM\ManyToMany(targetEntity=Subscription::class, mappedBy="partnerships")
     */
    private $subscriptions;

    public function __construct()
    {
        $this->subscriptions = new ArrayCollection();
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
            $subscription->addPartnership($this);
        }

        return $this;
    }

    public function removeSubscription(Subscription $subscription): self
    {
        if ($this->subscriptions->removeElement($subscription)) {
            $subscription->removePartnership($this);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPsShopName()
    {
        return $this->ps_shop_name;
    }

    /**
     * @return mixed
     */
    public function getPsShopAddr()
    {
        return $this->ps_shop_addr;
    }

    /**
     * @return mixed
     */
    public function getPsShopCategory()
    {
        return $this->ps_shop_category;
    }
}
