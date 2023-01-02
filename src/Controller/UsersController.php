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
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\PasswordAuthenticatedInterface;

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

         public function edit_user (ManagerRegistry $doctrine, Request $request): Response
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

                $this->addFlash('success', "Votre profil a bien été mis à jour");

                return $this->redirectToRoute('app_user');
            }
            else {
                return $this->render('compte/edit_user.html.twig', [
                    'userForm' => $form->createView()
                ]);
            }   
        } 

        /**
         * @Route("/edit_pass", name="app_edit_pass")
         */
         public function edit_pass (ManagerRegistry $doctrine, Request $request, UserPasswordHasherInterface $passwordHasher): Response
        {
            if ($request->isMethod('POST')) {
                $manager = $doctrine->getManager();
                $user = $this->getUser();

                if ($request->request->get('pass') == $request->request->get('pass2')) {
                    $user->setPassword($passwordHasher->hashPassword($user, $request->get('pass'))); // Met une erreur mais fonctionne correctement
                    $manager->flush();

                    $this->addFlash('message', 'Mot de passe mis à jour ave succès');
                    return $this->redirectToRoute('app_user');
                } 
                else {
                    $this->addFlash('error', 'Les deux mots de passe ne sont pas identiques');
                }
            }

            return $this->render('compte/edit_pass.html.twig');
            
        } 


}
