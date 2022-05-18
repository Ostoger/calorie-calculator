<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\FoodCategories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function getCategories(): Response
    {
        $foodCategoriesRepository = $this->em->getRepository(FoodCategories::class);
        $foodCategories = $foodCategoriesRepository->getAllFoodCategoriesNames();

        return new Response(json_encode(['data' => $foodCategories]));
    }
}