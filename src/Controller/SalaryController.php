<?php

namespace App\Controller;

use App\Entity\Salary;
use App\Form\CarType;
use App\Form\SalaryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SalaryController extends AbstractController
{
    /**
     * @Route("/salary", name="salary")
     */
    public function index(Request $request): Response
    {
        $salary = new Salary();
        $form = $this->createForm(SalaryType::class, $salary);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $salary = $form->getData();
            dump($salary);
        }
        return $this->render('salary/index.html.twig', [
            'controller_name' => $form->createView(),
        ]);
    }
}
