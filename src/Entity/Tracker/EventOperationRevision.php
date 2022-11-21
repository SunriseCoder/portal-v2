<?php

namespace App\Entity\Tracker;

use App\Repository\Tracker\EventOperationRevisionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventOperationRevisionRepository::class)]
class EventOperationRevision
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?EventOperation $operation = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?EventOperationStatus $status = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateTime = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $summary = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOperation(): ?EventOperation
    {
        return $this->operation;
    }

    public function setOperation(?EventOperation $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

    public function getStatus(): ?EventOperationStatus
    {
        return $this->status;
    }

    public function setStatus(?EventOperationStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDateTime(): ?\DateTimeImmutable
    {
        return $this->dateTime;
    }

    public function setDateTime(\DateTimeImmutable $dateTime): self
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }
}
