<?php

namespace App\Controller;

use App\Entity\CarShowroom;
use App\Form\CarShowroomType;
use App\Repository\CarShowroomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/car/showroom", name="car_showroom.")
 */
class CarShowroomController extends AbstractController
{
    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request)
    {
        $car_showroom = new CarShowroom();
        $form = $this->createForm(CarShowroomType::class, $car_showroom);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $car_showroom = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car_showroom);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('car_showroom/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
        /**
         * @Route("/show", name="show")
         */
        public function show(CarShowroomRepository $carShowroomRepository){
            $carShowroom = $carShowroomRepository->findAll();
            return $this->render('car_showroom/index.html.twig',[
                'carShowrooms'=>$carShowroom
            ]);

    }
}
