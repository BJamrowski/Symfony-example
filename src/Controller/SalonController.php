<?php

namespace App\Controller;

use App\Entity\Salon;
use App\Form\SalonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/salon", name="salon.")
 */
class SalonController extends AbstractController
{
    /**
     * @Route("/create", name="new")
     */
    public function index(Request $request)
    {
        $salon = new Salon();

        $form = $this->createForm(SalonType::class, $salon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $salon = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($salon);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('salon/create.html.twig',[
            'createNewSalon' => $form->createView(),
        ]);
    }
}
