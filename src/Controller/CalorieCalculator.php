<?php

declare(strict_types=1);

namespace App\Controller;

use App\CalorieCalculator\FoodCategoryList;
use App\Entity\FoodCategories;
use App\Validator\FoodCategoryName;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\Cache\CacheInterface;

#[Route("/calorie-calculator")]
class CalorieCalculator extends AbstractController
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/main', name: 'calorie_calculator_main')]
    public function index(): Response
    {
        return $this->render('instruments/calorie_calculator.html.twig', []);
    }

    #[Route('/get-food-categories', methods: ['POST'])]
    public function getCategories(CacheInterface $cache): Response
    {
        $foodCategoriesRepository = $this->em->getRepository(FoodCategories::class);
        $foodCategories = $foodCategoriesRepository->getAllFoodCategoriesNames($cache);

        return new Response(json_encode($foodCategories));
    }

    /**
     * @throws \Exception
     */
    #[Route('/get-category-foods', name: 'get_category_foods', methods: ['POST'])]
    public function getCategoryFoods(Request $request, ValidatorInterface $validator): Response
    {
        $parameters = json_decode($request->getContent(), true);

        $categoryName = $parameters['categoryName'] ?? null;
        $pageNumber = $parameters['pageNumber'];

        $input = [
            'categoryName' => $categoryName,
            'pageNumber' => $pageNumber
        ];

        $constraint = new Assert\Collection([
            'categoryName' => [new FoodCategoryName(), new Assert\Optional()],
            'pageNumber' => [new Assert\Type('integer'), new Assert\NotBlank],
        ]);

        $violations = $validator->validate($input, $constraint);
        if (count($violations) > 0) {
            return new Response(json_encode(['data' => $violations]), Response::HTTP_BAD_REQUEST);
        }

        $foodCategoryList = new FoodCategoryList($this->em, $categoryName, $pageNumber);
        $foodNamesList = $foodCategoryList->getFoodsForFoodCategory();

        return new Response(json_encode(['data' => $foodNamesList]));
    }
}