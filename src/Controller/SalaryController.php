<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Salary;
use App\Entity\SalesDoc;
use App\Entity\Sell;
use App\Form\SalaryType;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SalaryController extends AbstractController
{
    /**
     * @Route("/salary/{slug}", name="salary")
     * @throws Exception
     */
    public function index(Request $request, int $slug): Response
    {
        $salary = new Salary();

        $user = $this->getUser();
        $car = $this->getDoctrine()->getRepository(Car::class)->find($slug);

        $salary->setUsername($user->getUsername());
        $salary->setPrice($car->getPrice());
        $salary->setSalesDocNumber(uniqid());

        $form = $this->createForm(SalaryType::class, $salary);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $salary = $form->getData();

            $sell = new Sell();
            $sell
                ->setSellDate(new \DateTime($salary->getSellDate()))
                ->setPaymentMethod($salary->getPaymentMethods())
                ->setUsername($salary->getUsername())
                ->setPhoneNumber($salary->getPhoneNumber())
                ->setCar($car);

            $salesDoc = new SalesDoc();
            $salesDoc
                ->setSalesDocNumber($salary->getSalesDocNumber())
                ->setName($salary->getName())
                ->setSurname($salary->getSurname())
                ->setPrice($salary->getPrice())
                ->setSell($sell);

            $car->setAvailability(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($car);
            $em->persist($sell);
            $em->persist($salesDoc);

            $em->flush();

            $this->redirectToRoute('home');
        }
        return $this->render('salary/index.html.twig', [
            'controller_name' => $form->createView(),
        ]);
    }
}
