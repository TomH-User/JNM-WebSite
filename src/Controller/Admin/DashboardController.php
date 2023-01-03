<?php

namespace App\Controller\Admin;

use App\Entity\Partenaires;
use App\Entity\Statut;
use App\Repository\ActivitesRepository;
use App\Repository\LogementRepository;
use App\Repository\OffreRepository;
use App\Repository\PartenairesRepository;
use App\Repository\StatutRepository;
use App\Repository\TransportRepository;
use App\Repository\UsersRepository;
use App\Repository\VideoRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
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
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig', [
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

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ProjetWeb');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
