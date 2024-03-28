<?php

namespace App\Entity;

use App\Repository\GroceryListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroceryListRepository::class)]
class GroceryList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'groceryLists')]
    private ?User $createdBy = null;

    #[ORM\OneToMany(targetEntity: GroceryListItem::class, mappedBy: 'groceryList', orphanRemoval: true)]
    private Collection $groceryListItems;

    public function __construct()
    {
        $this->groceryListItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * @return Collection<int, GroceryListItem>
     */
    public function getGroceryListItems(): Collection
    {
        return $this->groceryListItems;
    }

    public function addGroceryListItem(GroceryListItem $groceryListItem): static
    {
        if (!$this->groceryListItems->contains($groceryListItem)) {
            $this->groceryListItems->add($groceryListItem);
            $groceryListItem->setGroceryList($this);
        }

        return $this;
    }

    public function removeGroceryListItem(GroceryListItem $groceryListItem): static
    {
        if ($this->groceryListItems->removeElement($groceryListItem)) {
            // set the owning side to null (unless already changed)
            if ($groceryListItem->getGroceryList() === $this) {
                $groceryListItem->setGroceryList(null);
            }
        }

        return $this;
    }
}
