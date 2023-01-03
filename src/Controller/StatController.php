<?php

namespace App\Controller;

use App\Repository\OffreRepository;
use App\Repository\UsersRepository;
use App\Repository\VideoRepository;
use App\Repository\StatutRepository;
use App\Repository\LogementRepository;
use App\Repository\ActivitesRepository;
use App\Repository\TransportRepository;
use App\Repository\PartenairesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StatController extends AbstractController
{
    protected $activitesRepository;
    protected $logementRepository;
    protected $offreRepository;
    protected $partenairesRepository;
    protected $statutRepository;
    protected $transportRepository;
    protected $usersRepository;
    protected $videoRepository;

    public function __construct(
        ActivitesRepository $activitesRepository,
        LogementRepository $logementRepository,
        OffreRepository $offreRepository,
        PartenairesRepository $partenairesRepository,
        StatutRepository $statutRepository,
        TransportRepository $transportRepository,
        UsersRepository $usersRepository,
        VideoRepository $videoRepository
    )
    {
        $this->activitesRepository = $activitesRepository;
        $this->logementRepository = $logementRepository;
        $this->offreRepository = $offreRepository;
        $this->partenairesRepository = $partenairesRepository;
        $this->statutRepository = $statutRepository;
        $this->transportRepository = $transportRepository;
        $this->usersRepository = $usersRepository;
        $this->videoRepository = $videoRepository;
    }

    /**
     * @Route("/stats", name="app_stats")
     */
    public function index(): Response
    {
        return $this->render('statistiques/stats.html.twig', [
            'countAllUser' => $this->usersRepository->countAllUser(),
            'countAllPartenaire' => $this->partenairesRepository->countAllPartenaires(),
            'countAllTransport' => $this->transportRepository->countAllTransport(),
            'countAllLogement' => $this->logementRepository->countAllLogement(),
            'countAllActivite' => $this->activitesRepository->countAllActivites() ,
            'countAllVideo' => $this->videoRepository->countAllVideo(),
            'countAllStatut' => $this->statutRepository->countAllStatut(),
            'countAllOffre' => $this->offreRepository->countAllOffre(),
            'statuts' => $this->statutRepository->findAll(),
            'selectAllStatut' => $this->usersRepository->selectAllStatut()
        ]);
    }


    // /**
    //  * Undocumented function
    //  * @Route("/stats", name="app_stats")
    //  */
    // public function stats(): Response
    // {
    //     return $this->render('statistiques/stats.html.twig');
    // }
}



