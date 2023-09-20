<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



#[UniqueEntity('reference')]
#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: CarRepository::class)]

#[Vich\Uploadable]


class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // NOTE: This is not a mapped field of entity metadata, just a simple property.
    #[Vich\UploadableField(mapping: 'car_images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;


  



   


    #[ORM\ManyToOne(inversedBy: 'cars')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Brand $brand = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Model $model = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Year $year = null;

    #[ORM\Column]
    private ?int $mileage = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Color $color = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Energy $energy = null;

    #[ORM\Column]
    private ?int $power = null;

    #[ORM\Column]
    private ?int $price = null;



    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateCirculation = null;

    #[ORM\Column(length: 20, unique:true)]
    private ?string $reference = null;

    
    #[ORM\OneToMany(mappedBy: 'car', targetEntity: Image::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Collection $Image;

//    #[ORM\Column(length: 255)]
//     private ?string $img = null;

    #[ORM\OneToMany(mappedBy: 'car', targetEntity: Customer::class)]
    private Collection $customers;

    #[ORM\OneToMany(mappedBy: 'reference', targetEntity: Contact::class)]
    private Collection $contacts;

    #[ORM\Column(length: 255)]
    private ?string $imageName = null;

  
    public function __construct()
    {
        
        $this->images = new ArrayCollection();
        $this->Image = new ArrayCollection();
        $this->customers = new ArrayCollection();
        $this->contacts = new ArrayCollection();
    }

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getYear(): ?Year
    {
        return $this->year;
    }

    public function setYear(?Year $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?color $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getEnergy(): ?Energy
    {
        return $this->energy;
    }

    public function setEnergy(?Energy $energy): static
    {
        $this->energy = $energy;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(int $power): static
    {
        $this->power = $power;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }



    public function getDateCirculation(): ?\DateTimeInterface
    {
        return $this->dateCirculation;
    }

    public function setDateCirculation(\DateTimeInterface $dateCirculation): static
    {
        $this->dateCirculation = $dateCirculation;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }


  

    /**
     * @return Collection<int, Customer>
     */
    public function getCustomers(): Collection
    {
        return $this->customers;
    }

    public function addCustomer(Customer $customer): static
    {
        if (!$this->customers->contains($customer)) {
            $this->customers->add($customer);
            $customer->setCar($this);
        }

        return $this;
    }

    public function removeCustomer(Customer $customer): static
    {
        if ($this->customers->removeElement($customer)) {
            // set the owning side to null (unless already changed)
            if ($customer->getCar() === $this) {
                $customer->setCar(null);
            }
        }

        return $this;
    }

    public function __toString(){

        return $this->name ?? '';
    }

    /**
     * @return Collection<int, Contact>
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): static
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts->add($contact);
            $contact->setReference($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): static
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getReference() === $this) {
                $contact->setReference(null);
            }
        }

        return $this;
    }

 

/**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImage(): Collection
    {
        return $this->Image;
    }

    public function addImage(Image $image): static
    {
        if (!$this->Image->contains($image)) {
            $this->Image->add($image);
            $image->setCar($this);
        }

        return $this;
    }

    public function removeImage(Image $image): static
    {
        if ($this->Image->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getCar() === $this) {
                $image->setCar(null);
            }
        }

        return $this;
    }

}
