<?php

declare(strict_types=1);

namespace App\CalorieCalculator;

use App\Entity\FoodCategories;
use App\Entity\Foods;
use App\Enums\FoodCategoriesEnum;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\Join;
use Symfony\Component\Cache\Adapter\MemcachedAdapter;

class FoodCategoryList
{
    private string $categoryName;
    private int $pageNumber;
    private EntityManagerInterface $em;

    private const LIST_SIZE = 10;

    /**
     * @param EntityManagerInterface $em
     * @param string $categoryName
     * @param int $pageNumber
     */
    public function __construct(EntityManagerInterface $em, string $categoryName, int $pageNumber)
    {
        $this->em = $em;
        $this->categoryName = $categoryName;
        $this->pageNumber = $pageNumber;
    }

    /**
     * @throws \Exception
     */
    public function getFoodsForFoodCategory(): array
    {
        $notFormattedFoods = $this->getNotFormattedFoodsForFoodCategory();
        return $this->getformattedCategoryFoods($notFormattedFoods);
    }

    /**
     * @throws \Exception
     */
    private function getNotFormattedFoodsForFoodCategory(): array
    {
        $offset = self::LIST_SIZE * ($this->pageNumber - 1);
        $foodsRepository = $this->em->getRepository(Foods::class);
        $categoryId = FoodCategoriesEnum::getFoodCategoryId($this->categoryName);

        return $foodsRepository->createQueryBuilder('f')
            ->select('f.name, f.energy, f.protein, f.fat, f.carbohydrate, f.description')
            ->leftJoin(FoodCategories::class, 'fc',Join::WITH, 'fc.id = f.foodCategoryId')
            ->where('fc.id = :id')
            ->setParameter('id', $categoryId)
            ->setFirstResult($offset)
            ->setMaxResults(self::LIST_SIZE)
            ->getQuery()
            ->getResult();
    }

    /**
     * @throws \Exception
     */
    private function getformattedCategoryFoods(array $foods): array
    {
        return array_map(static fn($food): array => [
            'name' => $food['name'],
            'description' => $food['description'],
            'additional' => [
                'energy' => $food['energy'],
                'protein' => $food['protein'],
                'fat' => $food['fat'],
                'carbohydrate' => $food['carbohydrate']
            ]
        ], $foods);
    }
}