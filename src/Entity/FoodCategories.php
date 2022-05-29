<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FoodCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: FoodCategoriesRepository::class)]
#[Table('food_categories')]
class FoodCategories
{
    #[Id]
    #[Column(type: 'integer', ), GeneratedValue]
    private int $id;

    #[Column(length: 255)]
    private string $name;

    #[OneToMany(mappedBy: 'foodCategoryId', targetEntity: Foods::class)]
    private Collection $foods;

    public function __construct()
    {
        $this->foods = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getFoods(): Collection
    {
        return $this->foods;
    }

    public function getId(): ?int
    {
        return $this->id;
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
}