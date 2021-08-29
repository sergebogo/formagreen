<?php

namespace App\Entity;

use App\Repository\VolunteerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VolunteerRepository::class)
 */
class Volunteer extends Member
{
    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $vt_mobility;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $vt_skills;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $vt_years_exp;

    /**
     * @return mixed
     */
    public function getVtMobility()
    {
        return $this->vt_mobility;
    }

    /**
     * @return mixed
     */
    public function getVtSkills()
    {
        return $this->vt_skills;
    }

    /**
     * @return mixed
     */
    public function getVtYearsExp()
    {
        return $this->vt_years_exp;
    }
}
