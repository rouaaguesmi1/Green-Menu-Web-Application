<?php

namespace App\Entity;

use App\Repository\RestauranttableRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RestauranttableRepository::class)]
class Restauranttable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private $tableid;
    
    #[ORM\Column(type: 'boolean')]
    #[Assert\Range(
        min: 0, 
        max: 1,
        minMessage: "The value should be either 0 or 1.",
        maxMessage: "The value should be either 0 or 1."
    )]
    private $isoccupied;

    #[ORM\ManyToOne(targetEntity: Restaurant::class)]
    #[ORM\JoinColumn(name: "restaurantid", referencedColumnName: "restaurantid")]
    private $restaurantid;    

    public function getTableid(): ?int
    {
        return $this->tableid;
    }

    public function getIsoccupied(): ?bool
    {
        return (bool) $this->isoccupied;
    }

    public function setIsoccupied(?bool $isoccupied): static
    {
        $this->isoccupied = $isoccupied ? 1 : 0;

        return $this;
    }

    public function getRestaurantid(): ?Restaurant
    {
        return $this->restaurantid;
    }

    public function setRestaurantid(?Restaurant $restaurantid): static
    {
        $this->restaurantid = $restaurantid;

        return $this;
    }

    public function __toString(): string
    {
        return (string) $this->tableid;
    }
}
