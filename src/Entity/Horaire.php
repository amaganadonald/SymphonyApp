<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\HoraireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
#[ApiResource]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $EntryHour = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $StartBreak = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $EndBreak = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $LeaveHour = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Code = null;

    #[ORM\ManyToMany(targetEntity: Department::class, mappedBy: 'horaire')]
    private Collection $departments;

    public function __construct()
    {
        $this->departments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getEntryHour(): ?\DateTimeInterface
    {
        return $this->EntryHour;
    }

    public function setEntryHour(\DateTimeInterface $EntryHour): static
    {
        $this->EntryHour = $EntryHour;

        return $this;
    }

    public function getStartBreak(): ?\DateTimeInterface
    {
        return $this->StartBreak;
    }

    public function setStartBreak(?\DateTimeInterface $StartBreak): static
    {
        $this->StartBreak = $StartBreak;

        return $this;
    }

    public function getEndBreak(): ?\DateTimeInterface
    {
        return $this->EndBreak;
    }

    public function setEndBreak(?\DateTimeInterface $EndBreak): static
    {
        $this->EndBreak = $EndBreak;

        return $this;
    }

    public function getLeaveHour(): ?\DateTimeInterface
    {
        return $this->LeaveHour;
    }

    public function setLeaveHour(\DateTimeInterface $LeaveHour): static
    {
        $this->LeaveHour = $LeaveHour;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->Code;
    }

    public function setCode(?string $Code): static
    {
        $this->Code = $Code;

        return $this;
    }

    /**
     * @return Collection<int, Department>
     */
    public function getDepartments(): Collection
    {
        return $this->departments;
    }

    public function addDepartment(Department $department): static
    {
        if (!$this->departments->contains($department)) {
            $this->departments->add($department);
            $department->addHoraire($this);
        }

        return $this;
    }

    public function removeDepartment(Department $department): static
    {
        if ($this->departments->removeElement($department)) {
            $department->removeHoraire($this);
        }

        return $this;
    }
}
