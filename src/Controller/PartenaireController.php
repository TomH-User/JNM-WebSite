<?php

namespace App\Controller;

use App\Entity\Partenaires;
use App\Form\PartenaireFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PartenaireController extends AbstractController
{
    #[Route('/partenaire1', name: 'app_partenaire')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $partenaire = new Partenaires();
        $form = $this->createForm(PartenaireFormType::class, $partenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password

            $entityManager->persist($partenaire);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_connexion');
        }

        return $this->render('partenaire/partenaire.html.twig', [
            'partenaireForm' => $form->createView(),
        ]);
    }
}
