<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FoodsRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: FoodsRepository::class)]
#[Table('foods')]
class Foods
{
    #[Id, Column, GeneratedValue]
    private int $id;

    #[ManyToOne(targetEntity: FoodCategories::class, inversedBy: 'foods')]
    private $foodCategory;

    #[Column(nullable: false)]
    private int $energy;

    #[Column(nullable: false)]
    private int $protein;

    #[Column(nullable: false)]
    private int $fat;

    #[Column(nullable: false)]
    private int $carbohydrate;

    #[Column(length: 255)]
    private string $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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
