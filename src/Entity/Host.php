<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HostRepository")
 */
class Host
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ip;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Hostgroup", mappedBy="hosts")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

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
            $hostgroup->addHost($this);
        }

        return $this;
    }

    public function removeHostgroup(Hostgroup $hostgroup): self
    {
        if ($this->hostgroups->contains($hostgroup)) {
            $this->hostgroups->removeElement($hostgroup);
            $hostgroup->removeHost($this);
        }

        return $this;
    }
}
