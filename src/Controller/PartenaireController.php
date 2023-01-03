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
use App\Form\UsersFormType;

class PartenaireController extends AbstractController
{

        /**
         * Undocumented function
         * @Route("/liste_partenaire", name="app_liste_partenaire")
         */
        public function liste_partenaire(): Response
        {
            return $this->render('partenaires/liste_partenaire.html.twig');
        }
    

}