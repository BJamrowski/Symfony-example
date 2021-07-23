<?php

namespace App\Controller;

use App\Entity\CarShowroom;
use App\Repository\CarRepository;
use App\Repository\CarShowroomRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, CarRepository $carRepository)
    {
        //$carShowroom = $carShowroomRepository->findAll();
        $form = $this->createFormBuilder(null)
            ->add('carShowroom',EntityType::class, [
                'class'=>'App\Entity\CarShowroom',
            ])
            ->add('submit',SubmitType::class)
            ->getForm()
        ;

        $form->handleRequest($request);
        $car = null;
        if($form->isSubmitted() && $form->isValid()) {

            $query = $request->request->get('form')['carShowroom'];
            if ($query) {
                $car = $carRepository->findBy(['id' => $query]);
            }
            dump($car);
        }
        return $this->render('home/index.html.twig',[
            'form' => $form->createView(),
            'cars' => $car,
        ]);
   }

//    /**
//     * @Route("/select", name="select")
//     */
//   public function handleSelect(Request $request, CarRepository $carRepository){
//
//       $query = $request->request->get('form')['carShowroom'];
//       if($query){
//           $car = $carRepository->findBy(['id' => $query ]);
//       }
//        dump($car);
//
//       return $this->render('home/select.html.twig',[
//           'cars' => $car
//       ]);
//   }


}
