<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FoodsRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: FoodsRepository::class)]
#[Table('foods')]
class Foods
{
    #[Id, Column, GeneratedValue]
    private int $id;

    #[ManyToOne(targetEntity: FoodCategories::class, inversedBy: 'foods')]
    #[JoinColumn(name: 'food_category_id', referencedColumnName: 'id', nullable: false)]
    private int $foodCategoryId;

    #[Column(nullable: false)]
    private float $energy;

    #[Column(nullable: false)]
    private float $protein;

    #[Column(nullable: false)]
    private float $fat;

    #[Column(nullable: false)]
    private float $carbohydrate;

    #[Column(length: 255)]
    private string $name;

    #[Column(length: 255)]
    private string $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
