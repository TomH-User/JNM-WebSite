<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */

    public function index(): Response
    {
        return $this->render('accueil/accueil.html.twig');
    }
    /**
     *@Route("/info_jnm", name="app_info_jnm")
     */

    public function info_jnm(): Response
    {
        return $this->render('informations/info_jnm.html.twig');

    }

    /**
     * Undocumented function
     * @Route("/info_campus", name="app_info_campus")
     */
    public function info_campus(): Response
    {
        return $this->render('informations/info_campus.html.twig');
    }
    /**
     * Undocumented function
     * @Route("/inscription", name="app_incrisption")
     */
    public function inscription(): Response
    {
        return $this->render('compte/inscription.html.twig');
    }
    /**
     * Undocumented function
     * @Route("/connexion", name="app_connexion")
     */
    public function connexion(): Response
    {
        return $this->render('compte/login.html.twig');
    }
    /**
     * Undocumented function
     * @Route("/deconnexion", name="app_deconnexion")
     */
    public function deconnexion(): Response
    {
        return $this->render('compte/deconnexion.html.twig');
    }
    /**
     * Undocumented function
     * @Route("/logement", name="app_logement")
     */
    public function logement(): Response
    {
        return $this->render('sejour/logement.html.twig');
    }
    /**
     * Undocumented function
     * @Route("/transport", name="app_transport")
     */
    public function transport(): Response
    {
        return $this->render('sejour/transport.html.twig');
    }
    /**
     * Undocumented function
     * @Route("/liste_activite", name="app_liste_activite")
     */
    public function liste_activite(): Response
    {
        return $this->render('activite/liste_activite.html.twig');
    }
    /**
     * Undocumented function
     * @Route("/new_activite", name="app_new_activite")
     */
    public function activite(): Response
    {
        return $this->render('activite/new_activite.html.twig');
    }
    /**
     * Undocumented function
     * @Route("/stats", name="app_stats")
     */
    public function stats(): Response
    {
        return $this->render('statistiques/stats.html.twig');
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
     * @Route("/partenaire1", name="app_new_partenaire")
     */
    public function new_partenaire(): Response
    {
        return $this->render('partenaires/partenaire.html.twig');
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
     * @Route("/contact", name="app_contact")
     */

    public function contact(): Response
    {
        return $this->render('contact/contact.html.twig');
    }
}
