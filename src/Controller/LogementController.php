<?php

namespace App\Controller;

use App\Entity\Logement;
use App\Form\LogementFormType;
use App\Repository\LogementRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LogementController extends AbstractController
{
    /**
     * Undocumented function
     * @Route("/liste_logement", name="app_liste_logement")
     */
    public function liste_logement(LogementRepository $LogementRepository): Response
    {
        return $this->render('sejour/liste_logement.html.twig', [
            'logements' => $LogementRepository->findBy([], ['prix' => 'asc'])
        ]);
    }
}
