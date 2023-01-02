<?php

namespace App\Controller;

use App\Entity\Transport;
use App\Form\TransportFormType;
use App\Repository\TransportRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TransportController extends AbstractController
{
        /**
         * Undocumented function
         * @Route("/new_transport", name="app_new_transport")
         */
        public function new_transport (ManagerRegistry $doctrine, Request $request): Response
        {
            // Instanciation de l'entité concernée
            $transport = new Transport();

            // Création de l'objet formulaire
            $form = $this->createForm(TransportFormType::class, $transport);
                
            $form->handleRequest($request);

            if($form->isSubmitted()) {
                $manager = $doctrine->getManager();
                $manager->persist($transport);

                $manager->flush();

                $this->addFlash('success', $transport->getOffre()."a été ajouté avec succès");

                return $this->redirectToRoute('app_accueil');
            }
            else {
                return $this->render('sejour/new_transport.html.twig', [
                    'transportForm' => $form->createView()
                ]);
            }   
        }

    /**
     * Undocumented function
     * @Route("/liste_transport", name="app_liste_transport")
     */
    public function liste_logement(TransportRepository $TransportRepository): Response
    {
        return $this->render('sejour/liste_transport.html.twig', [
            'transports' => $TransportRepository->findBy([], ['prix' => 'asc'])
        ]);
    }
}
