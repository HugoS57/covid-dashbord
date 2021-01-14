<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/etat/{region}", name="etat")
     */
    public function etat($region = null): Response
    {
        $nbRegion = $region;
        $connexionbdd = new BddController();
        $sql = "SELECT SUM(G.gueris)
                FROM GUERIS as G
                WHERE G.idDep in ('57','54','55','93','20') AND G.Date >= ('2021-01-04') AND G.Date <= ('2021-01-09')
                GROUP BY G.Date ";
        $array = $connexionbdd->query($sql);
        return $this->render('home/etat.html.twig', [
            'controller_name' => 'HomeController',
            'connexion' => 'connexionbdd'
        ]);
    }
    
    /**
     *  @Route("/", name="accueil")
     */ 
    public function home() {
        $connexionbdd = new BddController();
        $sql = 'SELECT SUM(G.gueris)
                FROM GUERIS as G';
        $array = $connexionbdd->query($sql);
        return $this->render('home/accueil.html.twig', [
            'title' => "Bienvenue sur le Covid-Dashboard",
            'age' => 28
        ]);
    }
}
