<?php

//Limite de temps de rafraîchissement enlevé
set_time_limit(0);

//Connexion à la BdD
session_start();
require_once('bddServeur.php');
$bdd = new bddServeur();

$start = new DateTime('2020-09-01');
$end = new DateTime('2021-01-09');
foreach (new DatePeriod($start, new DateInterval('P1D') /* pas d'un jour */, $end) as $dt) {
    $date = $dt->format('Y-m-d');
    $ch = curl_init("https://coronavirusapi-france.now.sh/AllDataByDate?date=".$dt->format('Y-m-d'));

    //Enleve erreur certificat SSL
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Récupération de l'URL et affichage sur le navigateur
    $donneapi = curl_exec($ch);

    //SI ERREUR
    if (curl_error($ch)) {
        fwrite($fp, curl_error($ch));
    }

    // Fermeture de la session cURL
    curl_close($ch);

    $donneapi = json_decode($donneapi);

    //TOUS LES DEPARTEMENTS
    $i = 0;
    do {
    $nomdept = $donneapi->{'allFranceDataByDate'}[$i]->{'nom'};
    $arrayDept = $bdd->query('SELECT no_dept FROM DEPARTEMENT WHERE nom_dept="'.$nomdept.'"');
    $no_dept = $arrayDept[0][0];
    //Remplissage de la table GUERIS
    $bdd->ajout('INSERT INTO GUERIS (no_dept, date, gueris) VALUES ('.$no_dept.',"'.$date.'",'.$donneapi->{'allFranceDataByDate'}[$i]->{'gueris'}.')');
    //Remplissage de la table HOSPITALISATION
    $bdd->ajout('INSERT INTO HOSPITALISATION (no_dept, date, hospitalisation) VALUES ('.$no_dept.',"'.$date.'",'.$donneapi->{'allFranceDataByDate'}[$i]->{'hospitalises'}.')');
    //Remplissage de la table DECES
    $bdd->ajout('INSERT INTO DECES (no_dept, date, deces) VALUES ('.$no_dept.',"'.$date.'",'.$donneapi->{'allFranceDataByDate'}[$i]->{'deces'}.')');
    //Remplissage de la table REANIMATION
    $bdd->ajout('INSERT INTO REANIMATION (no_dept, date, reanimation) VALUES ('.$no_dept.',"'.$date.'",'.$donneapi->{'allFranceDataByDate'}[$i]->{'reanimation'}.')');

    $i = $i + 1;
    if ($i == 101){
        $i = 120;
    }
    else if ($i == 28 ){
        $i = 30;
    }
    }while ($i<=120);
}
?>