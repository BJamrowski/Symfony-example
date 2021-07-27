<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\CarShowroom;
use App\Form\CarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/car", name="car.")
 */
class CarController extends AbstractController
{
    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $car = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            /** @var UploadedFile $file */
            $file = $request->files->get('car')['attachment'];
            if($file){
                $filename = md5(uniqid()) .'.'. $file->guessClientExtension();
                $file->move(
                    $this->getParameter('uploads_dir'),
                    $filename
                );

               $car->setImage($filename);
               $car->setAvailability(true);

            }
            $entityManager->persist($car);
            $entityManager->flush();
            return $this->redirectToRoute('home');

        }
        return $this->render('car/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
