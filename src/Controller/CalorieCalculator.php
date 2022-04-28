<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalorieCalculator extends AbstractController
{
    #[Route('/calculator', name: 'calorie_calculator')]
    public function index(): Response
    {
        return $this->render('instruments/calorie_calculator.html.twig', []);
    }
}