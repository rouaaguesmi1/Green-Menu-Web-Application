<?php

namespace App\Entity;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


 #[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\Column]
    #[ORM\GeneratedValue]
    private ?int $iduser=null;


    #[Assert\NotBlank(message: ' the first name cant be null ')]
    #[Assert\Length(max: 35, maxMessage: 'you cant pass the {{ limit }} character.')]
    #[ORM\Column(length:35)]
    private ?string $firstname=null;
    


    #[Assert\NotBlank(message: ' the last name cant be null ')]
    #[Assert\Length(max: 35, maxMessage: 'you cant pass the {{ limit }} character.')]
    #[ORM\Column(length:35)]
     private ?string $lastname=null;


    
    #[Assert\NotBlank(message: '  "Email" cant be null .')]
    #[Assert\Email(message: 'please enter a valid email.')]
    #[ORM\Column(length: 50)]
    private ?string $email=null;



    #[ORM\Column(length: 20)]
    private ?string $address=null;

    #[ORM\Column(length: 20)]
    private ?string $role=null;

    #[ORM\Column]
    private ?int $number = null;


    #[Assert\Type(type: 'integer', message: 'the rating must be a number')]
    #[Assert\Length(max: 5,min: 0, maxMessage: 'you cant pass the {{ limit }}.',minMessage: 'you can give at least {{ limit }}.')]
    #[ORM\Column]
     private ?int $rating = null;



    #[Assert\NotBlank(message: 'the passwork cant be null')]
    #[Assert\Length(min: 8, minMessage: 'the password my be at least {{ limit }} character.')]
    #[ORM\Column(length: 255)]
    #[Assert\Regex(
        pattern:"/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{7,}/",
        message: 'Your password must be Strength',
    )]  
    private ?string $password=null;



    #[ORM\Column(length:300 )]
    private ?string $picture=null;



    public function getIduser(): ?int
    {
        return $this->iduser;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(?float $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    


}
