<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\Video;
use App\Form\VideoFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class VideoController extends AbstractController
{
    /**
     * @Route("e", name="app_video")
    * @ParamConverter("id",class="Users", options={"id": "id"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, Users $user): Response
    {
        $video = new Video();
        $video->setRefUtilisateur($user->getId1);
    
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
            'videoForm' => $form->createView(),
        ]);
    }
}
