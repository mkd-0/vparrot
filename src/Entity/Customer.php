<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $firstname = null;

    #[ORM\Column(length: 100)]
    private ?string $lastname = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column]
    private ?bool $isTestimony = null;

    #[ORM\OneToMany(mappedBy: 'customer', targetEntity: Testimony::class, orphanRemoval: true)]
    private Collection $testimonies;

    #[ORM\ManyToOne(inversedBy: 'customers')]
    private ?Car $car = null;

  

       
   


    
    public function __construct()
    {
        $this->testimonies = new ArrayCollection();
        $this->cars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function isIsTestimony(): ?bool
    {
        return $this->isTestimony;
    }

    public function setIsTestimony(bool $isTestimony): static
    {
        $this->isTestimony = $isTestimony;

        return $this;
    }

    /**
     * @return Collection<int, Testimony>
     */
    public function getTestimonies(): Collection
    {
        return $this->testimonies;
    }

    public function addTestimony(Testimony $testimony): static
    {
        if (!$this->testimonies->contains($testimony)) {
            $this->testimonies->add($testimony);
            $testimony->setCustomer($this);
        }

        return $this;
    }

    public function removeTestimony(Testimony $testimony): static
    {
        if ($this->testimonies->removeElement($testimony)) {
            // set the owning side to null (unless already changed)
            if ($testimony->getCustomer() === $this) {
                $testimony->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Car>
     */
    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function addCar(Car $car): static
    {
        if (!$this->cars->contains($car)) {
            $this->cars->add($car);
            $car->setCustomer($this);
        }

        return $this;
    }

    public function removeCar(Car $car): static
    {
        if ($this->cars->removeElement($car)) {
            // set the owning side to null (unless already changed)
            if ($car->getCustomer() === $this) {
                $car->setCustomer(null);
            }
        }

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): static
    {
        $this->car = $car;

        return $this;
    }
}
