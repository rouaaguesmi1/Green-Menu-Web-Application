<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use DateTime;
#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private $reservationid;

    #[ORM\Column(type: 'datetime')]
    #[Assert\NotBlank(message: "Date and time cannot be blank.")]
    #[Assert\DateTime(message: "Invalid date and time format.")]
    private $datetime;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Number of persons cannot be blank.")]
    #[Assert\Type(type: 'integer', message: "Number of persons must be an integer.")]
    #[Assert\Positive(message: "Number of persons must be a positive integer.")]
    private $numberofpersons;

    #[ORM\ManyToOne(targetEntity: Restauranttable::class)]
    #[ORM\JoinColumn(name: "tableid", referencedColumnName: "tableid")]
    private $tableid;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "userid", referencedColumnName: "iduser")]
    private $userid;

    public function getReservationid(): ?int
    {
        return $this->reservationid;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(?\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getNumberofpersons(): ?int
    {
        return $this->numberofpersons;
    }

    public function setNumberofpersons(?int $numberofpersons): self
    {
        $this->numberofpersons = $numberofpersons;

        return $this;
    }

    public function getTableid(): ?Restauranttable
    {
        return $this->tableid;
    }

    public function setTableid(?Restauranttable $tableid): self
    {
        $this->tableid = $tableid;

        return $this;
    }

    public function getUserid(): ?User
    {
        return $this->userid;
    }

    public function setUserid(?User $userid): self
    {
        $this->userid = $userid;

        return $this;
    }


    
}
