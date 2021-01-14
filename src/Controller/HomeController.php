<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/etat/{departement}", name="etat")
     */
    public function etat($departement = 1): Response
    {

        $connexionbdd = new BddController();

       // $sqlDepartement= "SELECT D.nom_dept
        //FROM DEPARTEMENT as D
        //WHERE D.no_dept = '.$departement.'" ;
        //$arrayDepartement = $connexionbdd->query($sqlDepartement);

        $sqlGueris = "SELECT G.gueris 
        FROM GUERIS as G
        WHERE G.no_dept ='.$departement.' AND G.date = (SELECT MAX(GU.date) FROM GUERIS as GU)" ;
        $arrayGueris = $connexionbdd->query($sqlGueris);

        $sqlReanimation = "SELECT R.reanimation
        FROM REANIMATION as R
        WHERE R.no_dept ='.$departement.' AND R.date = (SELECT MAX(RU.date) FROM REANIMATION as RU)" ;
        $arrayReanimation  = $connexionbdd->query($sqlReanimation);

        $sqlHospitalisation = "SELECT H.hospitalisation
        FROM HOSPITALISATION as H
        WHERE H.no_dept ='.$departement.' AND H.date = (SELECT MAX(HU.date) FROM HOSPITALISATION as HU)" ;
        $arrayHospitalisation  = $connexionbdd->query($sqlHospitalisation);

        $sqlDeces = "SELECT D.Deces
        FROM DECES as D
        WHERE D.no_dept ='.$departement.' AND D.date = (SELECT MAX(DU.date) FROM DECES as DU)" ;
        $arrayDeces  = $connexionbdd->query($sqlDeces);

        return $this->render('home/etat.html.twig', [
            'controller_name' => 'HomeController',
            'Gueris' => $arrayGueris[0],
            'Reanimation' => $arrayReanimation[0],
            'Hospitalisation' => $arrayHospitalisation[0],
            'Deces' => $arrayDeces[0],
            //'NomDepartement' => $arrayDepartement,
        ]);
    }
    
    /**
     *  @Route("/", name="accueil")
     */ 
    public function home() {

        $connexionbdd = new BddController();

        $sqlGueris = "SELECT SUM(gueris)
        FROM GUERIS
        WHERE date = (SELECT MAX(date) FROM GUERIS)" ;
        $arrayGueris = $connexionbdd->query($sqlGueris);

        $sqlDeces = "SELECT SUM(D.Deces)
        FROM DECES as D
        WHERE D.date = (SELECT MAX(DU.date) FROM DECES as DU)" ;
        $arrayDeces  = $connexionbdd->query($sqlDeces);

        $sqlReanimation = "SELECT SUM(R.reanimation)
        FROM REANIMATION as R
        WHERE R.date = (SELECT MAX(RU.date) FROM REANIMATION as RU)" ;
        $arrayReanimation  = $connexionbdd->query($sqlReanimation);

        $sqlHospitalisation = "SELECT SUM(H.hospitalisation)
        FROM HOSPITALISATION as H
        WHERE H.date = (SELECT MAX(HU.date) FROM HOSPITALISATION as HU)" ;
        $arrayHospitalisation  = $connexionbdd->query($sqlHospitalisation);

        return $this->render('home/accueil.html.twig', [
            'title' => "Bienvenue sur le Covid-Dashboard",
            'Gueris' => $arrayGueris[0],
            'Deces' => $arrayDeces[0],
            'Reanimation' => $arrayReanimation[0],
            'Hospitalisation' => $arrayHospitalisation[0],
        ]);
    }

     /**
     * @Route("/tri-etat", name="tri-etat")
     *
     */
    public function tri(){
        return $this->render('home/tri-etat.html.twig');
    }
}