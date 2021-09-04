<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=App\Repository\MemberRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "volunteer" = "Volunteer",
 *      "structure" = "Structure"
 *  })
 */
abstract class Member
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    protected $mb_nom;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    protected $mb_prenom;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    protected $mb_gender;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $mb_email;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    protected $mb_phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $mb_adresse;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $mb_date_insc;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $qrcode;

    /**
     * @ORM\OneToMany(targetEntity=Subscription::class, mappedBy="member", orphanRemoval=true)
     */
    protected $subscriptions;

    /**
     * @ORM\ManyToMany(targetEntity=GreenArea::class, inversedBy="members")
     */
    protected $greenAreas;

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

    /**
     * @return mixed
     */
    public function getMbNom()
    {
        return $this->mb_nom;
    }

    /**
     * @return mixed
     */
    public function getMbPrenom()
    {
        return $this->mb_prenom;
    }

    /**
     * @return mixed
     */
    public function getMbGender()
    {
        return $this->mb_gender;
    }

    /**
     * @return mixed
     */
    public function getMbEmail()
    {
        return $this->mb_email;
    }

    /**
     * @return mixed
     */
    public function getMbPhone()
    {
        return $this->mb_phone;
    }

    /**
     * @return mixed
     */
    public function getMbAdresse()
    {
        return $this->mb_adresse;
    }

    /**
     * @return mixed
     */
    public function getMbDateInsc()
    {
        return $this->mb_date_insc;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $mb_nom
     */
    public function setMbNom($mb_nom): void
    {
        $this->mb_nom = $mb_nom;
    }

    /**
     * @param mixed $mb_prenom
     */
    public function setMbPrenom($mb_prenom): void
    {
        $this->mb_prenom = $mb_prenom;
    }

    /**
     * @param mixed $mb_gender
     */
    public function setMbGender($mb_gender): void
    {
        $this->mb_gender = $mb_gender;
    }

    /**
     * @param mixed $mb_email
     */
    public function setMbEmail($mb_email): void
    {
        $this->mb_email = $mb_email;
    }

    /**
     * @param mixed $mb_phone
     */
    public function setMbPhone($mb_phone): void
    {
        $this->mb_phone = $mb_phone;
    }

    /**
     * @param mixed $mb_adresse
     */
    public function setMbAdresse($mb_adresse): void
    {
        $this->mb_adresse = $mb_adresse;
    }

    /**
     * @param mixed $mb_date_insc
     */
    public function setMbDateInsc($mb_date_insc): void
    {
        $this->mb_date_insc = $mb_date_insc;
    }

    /**
     * @param mixed $subscriptions
     */
    public function setSubscriptions($subscriptions): void
    {
        $this->subscriptions = $subscriptions;
    }

    /**
     * @param mixed $greenAreas
     */
    public function setGreenAreas($greenAreas): void
    {
        $this->greenAreas = $greenAreas;
    }

    /**
     * @return mixed
     */
    public function getQrcode()
    {
        return $this->qrcode;
    }

    /**
     * @param mixed $qrcode
     */
    public function setQrcode($qrcode): void
    {
        $this->qrcode = $qrcode;
    }
}
