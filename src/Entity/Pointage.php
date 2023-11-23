<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PointageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PointageRepository::class)]
#[ApiResource]
class Pointage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $code = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $firstname = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $entryHour = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $startBreak = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $endBreak = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $leaveHour = null;

    #[ORM\ManyToOne(inversedBy: 'pointages')]
    private ?Employee $employee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getEntryHour(): ?\DateTimeInterface
    {
        return $this->entryHour;
    }

    public function setEntryHour(\DateTimeInterface $entryHour): static
    {
        $this->entryHour = $entryHour;

        return $this;
    }

    public function getStartBreak(): ?\DateTimeInterface
    {
        return $this->startBreak;
    }

    public function setStartBreak(\DateTimeInterface $startBreak): static
    {
        $this->startBreak = $startBreak;

        return $this;
    }

    public function getEndBreak(): ?\DateTimeInterface
    {
        return $this->endBreak;
    }

    public function setEndBreak(\DateTimeInterface $endBreak): static
    {
        $this->endBreak = $endBreak;

        return $this;
    }

    public function getLeaveHour(): ?\DateTimeInterface
    {
        return $this->leaveHour;
    }

    public function setLeaveHour(?\DateTimeInterface $leaveHour): static
    {
        $this->leaveHour = $leaveHour;

        return $this;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): static
    {
        $this->employee = $employee;

        return $this;
    }
}
