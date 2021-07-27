<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuyCarController extends AbstractController
{
    /**
     * @Route("/buy/car", name="buy_car")
     */
    public function index(): Response
    {
        return $this->render('buy_car/index.html.twig', [
            'controller_name' => 'BuyCarController',
        ]);
    }
}
