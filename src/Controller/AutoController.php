<?php

namespace App\Controller;

use App\Entity\Auto;
use App\Entity\Salon;
use App\Form\AutoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/auto", name="auto.")
 */
class AutoController extends AbstractController
{
    /**
     * @Route("/create", name="new")
     */
    public function index(Request $request)
    {
        $auto = new Auto();
        $salon = new Salon();

        $form = $this->createForm(AutoType::class, $auto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            dump($auto);
            $auto = $form->getData();

            $auto->setIdSalon($salon);


            $em = $this->getDoctrine()->getManager();
            $em->persist($auto);
            $em->flush();

            return $this->redirectToRoute('home');
        }


        return $this->render('auto/index.html.twig', [
            'createNewAuto' => 'ConferenceController'  //$form->createView(),
        ]);
    }
}
