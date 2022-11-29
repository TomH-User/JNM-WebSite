<?php

namespace App\Controller;

use App\Entity\Activites;
use App\Entity\Users;
use App\Form\ActiviteFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActiviteController extends AbstractController
{
    #[Route('/activite1', name: 'app_activite')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $activite = new Activites();
        $form = $this->createForm(ActiviteFormType::class, $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            
            
            $entityManager->persist($activite);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_connexion');
        }

        return $this->render('activite/activite.html.twig', [
            'activiteForm' => $form->createView(),
        ]);
    }
}
