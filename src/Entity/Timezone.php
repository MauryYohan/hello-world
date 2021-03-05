<?php

namespace App\Entity;

use App\Repository\TimezoneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TimezoneRepository::class)
 */
class Timezone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $group_fr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $group_en;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $detail;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="timezones")
     */
    private $country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupFr(): ?string
    {
        return $this->group_fr;
    }

    public function setGroupFr(string $group_fr): self
    {
        $this->group_fr = $group_fr;

        return $this;
    }

    public function getGroupEn(): ?string
    {
        return $this->group_en;
    }

    public function setGroupEn(string $group_en): self
    {
        $this->group_en = $group_en;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }
}
