<?php

namespace App\Controller;

use App\Entity\Activites;
use App\Form\ActiviteFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;

class ActiviteController extends AbstractController
{
        /**
         * Undocumented function
         * @Route("/new_activite", name="app_new_activite")
         */
        public function new_activite (ManagerRegistry $doctrine, Request $request): Response
        {
            // Instanciation de l'entité concernée
            $activite = new Activites();

            // Création de l'objet formulaire
            $form = $this->createForm(ActiviteFormType::class, $activite);
                
            $form->handleRequest($request);

            if($form->isSubmitted()) {
                $manager = $doctrine->getManager();
                $manager->persist($activite);

                $manager->flush();

                $this->addFlash('success', $activite->getIntitule()."a été ajouté avec succès");

                return $this->redirectToRoute('app_accueil');
            }
            else {
                return $this->render('activite/new_activite.html.twig', [
                    'activiteForm' => $form->createView()
                ]);
            }   
        }

        /**
         * Undocumented function
         * @Route("/liste_activite", name="app_liste_activite")
         */
        public function liste_activite(): Response
        {
            return $this->render('activite/liste_activite.html.twig');
        }
}
