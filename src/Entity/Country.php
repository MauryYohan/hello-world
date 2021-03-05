<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $alpha2;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $alpha3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_en;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_fr;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_hab;

    /**
     * @ORM\OneToMany(targetEntity=Timezone::class, mappedBy="country")
     */
    private $timezones;

    /**
     * @ORM\ManyToOne(targetEntity=Continent::class, inversedBy="countries")
     */
    private $continent;

    /**
     * @ORM\ManyToMany(targetEntity=Currency::class, inversedBy="countries")
     */
    private $currencies;

    /**
     * @ORM\ManyToMany(targetEntity=Language::class, inversedBy="countries")
     */
    private $languages;

    public function __construct()
    {
        $this->timezones = new ArrayCollection();
        $this->currencies = new ArrayCollection();
        $this->languages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlpha2(): ?string
    {
        return $this->alpha2;
    }

    public function setAlpha2(string $alpha2): self
    {
        $this->alpha2 = $alpha2;

        return $this;
    }

    public function getAlpha3(): ?string
    {
        return $this->alpha3;
    }

    public function setAlpha3(string $alpha3): self
    {
        $this->alpha3 = $alpha3;

        return $this;
    }

    public function getNameEn(): ?string
    {
        return $this->name_en;
    }

    public function setNameEn(string $name_en): self
    {
        $this->name_en = $name_en;

        return $this;
    }

    public function getNameFr(): ?string
    {
        return $this->name_fr;
    }

    public function setNameFr(string $name_fr): self
    {
        $this->name_fr = $name_fr;

        return $this;
    }

    public function getNbHab(): ?int
    {
        return $this->nb_hab;
    }

    public function setNbHab(int $nb_hab): self
    {
        $this->nb_hab = $nb_hab;

        return $this;
    }

    /**
     * @return Collection|Timezone[]
     */
    public function getTimezones(): Collection
    {
        return $this->timezones;
    }

    public function addTimezone(Timezone $timezone): self
    {
        if (!$this->timezones->contains($timezone)) {
            $this->timezones[] = $timezone;
            $timezone->setCountry($this);
        }

        return $this;
    }

    public function removeTimezone(Timezone $timezone): self
    {
        if ($this->timezones->removeElement($timezone)) {
            // set the owning side to null (unless already changed)
            if ($timezone->getCountry() === $this) {
                $timezone->setCountry(null);
            }
        }

        return $this;
    }

    public function getContinent(): ?Continent
    {
        return $this->continent;
    }

    public function setContinent(?Continent $continent): self
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * @return Collection|Currency[]
     */
    public function getCurrencies(): Collection
    {
        return $this->currencies;
    }

    public function addCurrency(Currency $currency): self
    {
        if (!$this->currencies->contains($currency)) {
            $this->currencies[] = $currency;
        }

        return $this;
    }

    public function removeCurrency(Currency $currency): self
    {
        $this->currencies->removeElement($currency);

        return $this;
    }

    /**
     * @return Collection|Language[]
     */
    public function getLanguages(): Collection
    {
        return $this->languages;
    }

    public function addLanguage(Language $language): self
    {
        if (!$this->languages->contains($language)) {
            $this->languages[] = $language;
        }

        return $this;
    }

    public function removeLanguage(Language $language): self
    {
        $this->languages->removeElement($language);

        return $this;
    }
}
