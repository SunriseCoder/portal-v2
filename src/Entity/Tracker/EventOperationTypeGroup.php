<?php

namespace App\Entity\Tracker;

use App\Repository\Tracker\EventOperationTypeGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventOperationTypeGroupRepository::class)]
class EventOperationTypeGroup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\OneToMany(mappedBy: 'group', targetEntity: EventOperationType::class)]
    private Collection $types;

    public function __construct()
    {
        $this->types = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Collection<int, EventOperationType>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(EventOperationType $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
            $type->setGroup($this);
        }

        return $this;
    }

    public function removeType(EventOperationType $type): self
    {
        if ($this->types->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getGroup() === $this) {
                $type->setGroup(null);
            }
        }

        return $this;
    }
}
