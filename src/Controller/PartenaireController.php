<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\Partenaires;
use App\Form\UsersFormType;
use App\Form\PartenaireFormType;
use App\Repository\TransportRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PartenairesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PartenaireController extends AbstractController
{

        /**
         * Undocumented function
         * @Route("/liste_partenaire", name="app_liste_partenaire")
         */
        public function liste_partenaire(PartenairesRepository $PartenairesRepository): Response
        {
            return $this->render('partenaires/liste_partenaire.html.twig', [
                'partenaires' => $PartenairesRepository->findBy([], ['Nomsociete' => 'asc'])
            ]);
        }

    //         /**
    //  * Undocumented function
    //  * @Route("/liste_transport", name="app_liste_transport")
    //  */
    // public function liste_logement(TransportRepository $TransportRepository): Response
    // {
    //     return $this->render('sejour/liste_transport.html.twig', [
    //         'transports' => $TransportRepository->findBy([], ['prix' => 'asc'])
    //     ]);
    // }
    

}