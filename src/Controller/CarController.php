<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\CarShowroom;
use App\Form\CarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/car", name="car")
 */
class CarController extends AbstractController
{
    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request)
    {
        $car = new Car();
        $car_showroom = new CarShowroom();
        $car->getCarShowroom($car_showroom->getName());
        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $car = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();
            return $this->redirectToRoute('home');

        }
        return $this->render('car/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
