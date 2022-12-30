<?php

namespace App\Controller;

use App\Entity\Activites;
use App\Form\ActiviteFormFType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActiviteAController extends AbstractController
{
    /**
    * Undocumented function
    * @Route("/new_activite", name="app_activite")
    */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $activite = new Activites();
        $form = $this->createForm(ActiviteFormFType::class, $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            
            
            $entityManager->persist($activite);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_connexion');
        }

        return $this->render('activite/new_activite.html.twig', [
            'activiteForm' => $form->createView(),
        ]);
    }
}
