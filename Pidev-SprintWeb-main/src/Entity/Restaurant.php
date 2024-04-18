<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass:RestaurantRepository::class)]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private $restaurantid;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 150)]
    private $name;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 150)]
    private $address;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 150)]
    private $description;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 150)]
    private $imagepath;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "userid", referencedColumnName: "iduser")]
    private $userid;

    public function getRestaurantid(): ?int
    {
        return $this->restaurantid;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImagepath(): ?string
    {
        return $this->imagepath;
    }

    public function setImagepath(?string $imagepath): static
    {
        $this->imagepath = $imagepath;

        return $this;
    }

    public function getUserid(): ?User
    {
        return $this->userid;
    }

    public function setUserid(?User $userid): static
    {
        $this->userid = $userid;

        return $this;
    }
    public function __toString(): string
    {
        return (string) $this->restaurantid;
    }
}
