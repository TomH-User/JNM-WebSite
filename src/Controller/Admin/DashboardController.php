<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Entity\Video;
use App\Entity\Statut;
use App\Entity\Logement;
use App\Entity\Activites;
use App\Entity\Transport;
use App\Entity\Partenaires;
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
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

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
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-users', Users::class);
        yield MenuItem::linkToCrud('Activités', 'fa fa-users', Activites::class);
        yield MenuItem::linkToCrud('Partenaires', 'fa fa-users', Partenaires::class);
        yield MenuItem::linkToCrud('Logements', 'fa fa-users', Logement::class);
        yield MenuItem::linkToCrud('Transports', 'fa fa-users', Transport::class);
        yield MenuItem::linkToCrud('Vidéos', 'fa fa-users', Video::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
