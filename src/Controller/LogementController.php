<?php

namespace App\Controller;

use App\Entity\Logement;
use App\Form\LogementFormType;
use App\Repository\LogementRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LogementController extends AbstractController
{
        /**
         * Undocumented function
         * @Route("/new_logement", name="app_new_logement")
         */
        public function new_logement (ManagerRegistry $doctrine, Request $request): Response
        {
            // Instanciation de l'entité concernée
            $logement = new Logement();

            // Création de l'objet formulaire
            $form = $this->createForm(LogementFormType::class, $logement);
                
            $form->handleRequest($request);

            if($form->isSubmitted()) {
                $manager = $doctrine->getManager();
                $manager->persist($logement);

                $manager->flush();

                $this->addFlash('success', $logement->getNomLogement()."a été ajouté avec succès");

                return $this->redirectToRoute('app_accueil');
            }
            else {
                return $this->render('sejour/new_logement.html.twig', [
                    'logementForm' => $form->createView()
                ]);
            }   
        }

    /**
     * Undocumented function
     * @Route("/liste_logement", name="app_liste_logement")
     */
    public function liste_logement(LogementRepository $LogementRepository): Response
    {
        return $this->render('sejour/liste_logement.html.twig', [
            'logements' => $LogementRepository->findBy([], ['prix' => 'asc'])
        ]);
    }
}
