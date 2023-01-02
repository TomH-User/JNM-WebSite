<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UsersFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UsersController extends AbstractController
{
        /**
         * @Route("/user", name="app_user")
         */

         public function User (ManagerRegistry $doctrine, Request $request): Response
        {
            // Instanciation de l'entité concernée
            $user = new Users();

            // Création de l'objet formulaire
            $form = $this->createForm(UsersFormType::class, $user);
                
            $form->handleRequest($request);

            if($form->isSubmitted()) {
                $manager = $doctrine->getManager();
                $manager->persist($user);

                $manager->flush();

                $this->addFlash('success', $user->getPrenom()."a été ajouté avec succès");

                return $this->redirectToRoute('app_accueil');
            }
            else {
                return $this->render('compte/user.html.twig', [
                    'userForm' => $form->createView()
                ]);
            }   
        } 
}
