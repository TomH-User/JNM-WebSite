<?php

namespace App\Controller;

use App\Entity\Video;
use App\Form\VideoFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;

class VideoController extends AbstractController
{
        /**
         * Undocumented function
         * @Route("/new_video", name="app_new_video")
         */
        public function new_transport (ManagerRegistry $doctrine, Request $request): Response
        {
            // Instanciation de l'entité concernée
            $video = new Video();

            // Création de l'objet formulaire
            $form = $this->createForm(VideoFormType::class, $video);
            $form->remove('refUtilisateur');
            $form->remove('nbVotes');
                
            $form->handleRequest($request);

            if($form->isSubmitted()) {
                $manager = $doctrine->getManager();
                $manager->persist($video);

                $manager->flush();

                $this->addFlash('success', $video->getLien()."a été ajouté avec succès");

                return $this->redirectToRoute('app_accueil');
            }
            else {
                return $this->render('video/new_video.html.twig', [
                    'videoForm' => $form->createView()
                ]);
            }   
        }

    /**
     * Undocumented function
     * @Route("/liste_video", name="app_liste_video")
     */
    public function liste_transport(): Response
    {
        return $this->render('video/liste_video.html.twig');
    }
}
