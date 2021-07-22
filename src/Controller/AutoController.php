<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutoController extends AbstractController
{
    /**
     * @Route("/auto", name="auto")
     */
    public function index(): Response
    {
        return $this->render('auto/index.html.twig', [
            'controller_name' => 'AutoController',
        ]);
    }
}
