<?php

declare(strict_types=1);

namespace App\Enums;

enum FoodCategoriesEnum: int
{
    case Grains = 1;
    case Fruits = 2;
    case ProteinFoods = 3;
    case Vegetables = 4;
    case Dairy = 5;
    case CompositeFoods = 6;
    case Pastry = 7;

    public static function getFoodCategoryId(string $categoryName): int
    {
        return match($categoryName) {
            'Grains' => self::Grains->value,
            'Fruits' => self::Fruits->value,
            'Protein foods' => self::ProteinFoods->value,
            'Vegetables' => self::Vegetables->value,
            'Dairy' => self::Dairy->value,
            'Composite foods' => self::CompositeFoods->value,
            'Pastry' => self::Pastry->value,
            default => throw new \Exception("Unexpected category name: $categoryName"),
        };
    }
}
