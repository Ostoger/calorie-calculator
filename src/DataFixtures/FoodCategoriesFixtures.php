<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\FoodCategories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FoodCategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = ['Fruits', 'Vegetables', 'Grains', 'Protein Foods', 'Dairy'];
        foreach ($categories as $category) {
            $foodCategories = new FoodCategories();
            $foodCategories->setName($category);
            $manager->persist($foodCategories);
        }

        $manager->flush();
    }
}
