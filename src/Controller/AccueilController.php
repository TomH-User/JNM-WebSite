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
     * @Route("/stats", name="app_stats")
     */
    public function stats(): Response
    {
        return $this->render('statistiques/stats.html.twig');
    }
   
    /**
     * @Route("/contact", name="app_contact")
     */

    public function contact(): Response
    {
        return $this->render('contact/contact.html.twig');
    }
}
