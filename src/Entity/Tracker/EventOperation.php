<?php

namespace App\Entity\Tracker;

use App\Repository\Tracker\EventOperationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventOperationRepository::class)]
class EventOperation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Event $event = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?EventOperationType $type = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?EventOperationStatus $status = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $summary = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }

    public function getType(): ?EventOperationType
    {
        return $this->type;
    }

    public function setType(?EventOperationType $type): self
    {
        $this->type = $type;

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
