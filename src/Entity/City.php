<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city_address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city_tel;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Hostgroup", mappedBy="cities")
     */
    private $hostgroups;

    public function __construct()
    {
        $this->hostgroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCityName(): ?string
    {
        return $this->city_name;
    }

    public function setCityName(string $city_name): self
    {
        $this->city_name = $city_name;

        return $this;
    }

    public function getCityAddress(): ?string
    {
        return $this->city_address;
    }

    public function setCityAddress(string $city_address): self
    {
        $this->city_address = $city_address;

        return $this;
    }

    public function getCityTel(): ?string
    {
        return $this->city_tel;
    }

    public function setCityTel(string $city_tel): self
    {
        $this->city_tel = $city_tel;

        return $this;
    }

    /**
     * @return Collection|Hostgroup[]
     */
    public function getHostgroups(): Collection
    {
        return $this->hostgroups;
    }

    public function addHostgroup(Hostgroup $hostgroup): self
    {
        if (!$this->hostgroups->contains($hostgroup)) {
            $this->hostgroups[] = $hostgroup;
            $hostgroup->addCity($this);
        }

        return $this;
    }

    public function removeHostgroup(Hostgroup $hostgroup): self
    {
        if ($this->hostgroups->contains($hostgroup)) {
            $this->hostgroups->removeElement($hostgroup);
            $hostgroup->removeCity($this);
        }

        return $this;
    }
}
