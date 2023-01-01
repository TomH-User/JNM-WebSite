<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\Partenaires;
use App\Form\PartenaireFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\TestUsersFormType;

class PartenaireController extends AbstractController
{
        /**
         * Undocumented function
         * @Route("/new_partenaire", name="app_new_partenaire")
         */
        public function newPartenaire (ManagerRegistry $doctrine, Request $request): Response
        {
            // Instanciation de l'entité concernée
            $partenaire = new Partenaires();

            // Création de l'objet formulaire
            $form = $this->createForm(PartenaireFormType::class, $partenaire);
                
            $form->handleRequest($request);

            if($form->isSubmitted()) {
                $manager = $doctrine->getManager();
                $manager->persist($partenaire);

                $manager->flush();

                $this->addFlash('success', $partenaire->getNomsociete()."a été ajouté avec succès");

                return $this->redirectToRoute('app_accueil');
            }
            else {
                return $this->render('partenaires/new_partenaire.html.twig', [
                    'partenaireForm' => $form->createView()
                ]);
            }   
        }

        /**
         * Undocumented function
         * @Route("/liste_partenaire", name="app_liste_partenaire")
         */
        public function liste_partenaire(): Response
        {
            return $this->render('partenaires/liste_partenaire.html.twig');
        }
    
        /**
         * Undocumented function
         * @Route("/delete_partenaire", name="app_delete_partenaire")
         */
        public function delete_partenaire(): Response
        {
            return $this->render('partenaires/delete_partenaire.html.twig');
        }



        /**
         * @Route("/new_user", name="app_new_user")
         */

         // Cette fonction est un test d'entrainement, elle n'a rien avoir avec le projet
         public function newUser (ManagerRegistry $doctrine, Request $request): Response
        {
            // Instanciation de l'entité concernée
            $user = new Users();

            // Création de l'objet formulaire
            $form = $this->createForm(TestUsersFormType::class, $user);
                
            $form->handleRequest($request);

            if($form->isSubmitted()) {
                $manager = $doctrine->getManager();
                $manager->persist($user);

                $manager->flush();

                $this->addFlash('success', $user->getPrenom()."a été ajouté avec succès");

                return $this->redirectToRoute('app_accueil');
            }
            else {
                return $this->render('compte/new_user.html.twig', [
                    'userForm' => $form->createView()
                ]);
            }   
        } 

}