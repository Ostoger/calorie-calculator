<?php

declare(strict_types=1);

namespace App\Enums;

enum FoodCategoriesEnum: string
{
    case Grains = 'Grains';
    case Fruits = 'Fruits';
    case ProteinFoods = 'Protein Foods';
    case Vegetables = 'Vegetables';
    case Dairy = 'Dairy';
    case CompositeFoods = 'Composite Foods';
    case Pastry = 'Pastry';


    public static function getFoodCategoryId(string $categoryName): int
    {
        return match($categoryName) {
            self::Grains->value => 1,
            self::Fruits->value => 2,
            self::ProteinFoods->value => 3,
            self::Vegetables->value => 4,
            self::Dairy->value => 5,
            self::CompositeFoods->value => 6,
            self::Pastry->value => 7,
            default => throw new \Exception("Unexpected category name: $categoryName"),
        };
    }
}
