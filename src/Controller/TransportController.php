<?php

namespace App\Controller;

use App\Entity\Transport;
use App\Form\TransportFormType;
use App\Repository\TransportRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TransportController extends AbstractController
{
    /**
     * Undocumented function
     * @Route("/liste_transport", name="app_liste_transport")
     */
    public function liste_logement(TransportRepository $TransportRepository): Response
    {
        return $this->render('sejour/liste_transport.html.twig', [
            'transports' => $TransportRepository->findBy([], ['prix' => 'asc'])
        ]);
    }
}
