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

    /**
     * @param mixed $vt_mobility
     */
    public function setVtMobility($vt_mobility): void
    {
        $this->vt_mobility = $vt_mobility;
    }

    /**
     * @param mixed $vt_skills
     */
    public function setVtSkills($vt_skills): void
    {
        $this->vt_skills = $vt_skills;
    }

    /**
     * @param mixed $vt_years_exp
     */
    public function setVtYearsExp($vt_years_exp): void
    {
        $this->vt_years_exp = $vt_years_exp;
    }
}
