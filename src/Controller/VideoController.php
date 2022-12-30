<?php

namespace App\Controller;

use App\Entity\Video;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VideoController extends AbstractController
{
    /**
    * Undocumented function
    * @Route("/video1", name="app_activite")
    */
    public function new(Request $request, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $video = new Video();
       // $user = $request->getUser();
        //$refUser = $user->;
        //$video->setRefUtilisateur($request->getUser());
        $form = $this->createForm(VideoFormType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            
            
            $entityManager->persist($video);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_connexion');
        }

        return $this->render('video/video.html.twig', [
            'activiteForm' => $form->createView(),
        ]);
    }
}
