<?php

namespace App\Controller;

use App\Entity\Statut;
use App\Form\StatutFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StatutController extends AbstractController
{
    /**
     * Undocumented function
     * @Route("/statut", name="app_statut")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $statut = new Statut();
        $form = $this->createForm(StatutFormType::class, $statut);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password

            $entityManager->persist($statut);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_connexion');
        }

        return $this->render('statut/statut.html.twig', [
            'statutForm' => $form->createView(),
        ]);
    }
}
