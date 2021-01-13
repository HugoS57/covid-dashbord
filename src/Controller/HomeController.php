<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/etat", name="etat")
     */
    public function etat(): Response
    {
        return $this->render('home/etat.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     *  @Route("/", name="accueil")
     */ 
    public function home() {
        return $this->render('home/accueil.html.twig', [
            'title' => "Bienvenue sur le Covid-Dashboard"
        ]);
    }
}