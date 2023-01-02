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

        public function consulter_user (): Response
        {
            return $this->render('compte/user.html.twig');
        }

        /**
         * @Route("/edit_user", name="app_edit_user")
         */

         public function modifier_user (ManagerRegistry $doctrine, Request $request): Response
        {
            // Instanciation de l'entité concernée
            $user = $this->getUser();

            // Création de l'objet formulaire
            $form = $this->createForm(UsersFormType::class, $user);
                
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                $manager = $doctrine->getManager();
                $manager->persist($user);

                $manager->flush();

                $this->addFlash('success', "Profil mis à jour");

                return $this->redirectToRoute('app_user');
            }
            else {
                return $this->render('compte/edit_user.html.twig', [
                    'userForm' => $form->createView()
                ]);
            }   
        } 


}
