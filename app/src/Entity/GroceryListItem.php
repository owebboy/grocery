<?php

namespace App\Entity;

use App\Repository\GroceryListItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroceryListItemRepository::class)]
class GroceryListItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'groceryListItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?GroceryList $groceryList = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Item $item = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(nullable: true)]
    private ?int $prioritization = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroceryList(): ?GroceryList
    {
        return $this->groceryList;
    }

    public function setGroceryList(?GroceryList $groceryList): static
    {
        $this->groceryList = $groceryList;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): static
    {
        $this->item = $item;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrioritization(): ?int
    {
        return $this->prioritization;
    }

    public function setPrioritization(?int $prioritization): static
    {
        $this->prioritization = $prioritization;

        return $this;
    }
}
