<?php
set_time_limit(0);
//Appelle du fichier connexion bdd
session_start();
require_once('bddServeur.php');

$bdd = new bddServeur();
$arrayDept = $bdd->query("SELECT nom_dept,no_dept FROM DEPARTEMENT");

foreach ($arrayDept as $dept){
    $nomdept = $dept[0];
    $no_dept = $dept[1];
    $nomdept = utf8_encode($nomdept);
    // Création d'une nouvelle ressource cURL
    $ch = curl_init("https://coronavirusapi-france.now.sh/LiveDataByDepartement?Departement=" . $nomdept);

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
    $date = $donneapi->{'LiveDataByDepartement'}[0]->{'date'};

    //Remplissage de la table GUERIS
    $bdd->ajout('INSERT INTO GUERIS (no_dept, date, gueris) VALUES ('.$no_dept.',"'.$date.'",'.$donneapi->{'LiveDataByDepartement'}[0]->{'gueris'}.')');

    //Remplissage de la table HOSPITALISATION
    $bdd->ajout('INSERT INTO HOSPITALISATION (no_dept, date, hospitalisation) VALUES ('.$no_dept.',"'.$date.'",'.$donneapi->{'LiveDataByDepartement'}[0]->{'hospitalises'}.')');

    //Remplissage de la table DECES
    $bdd->ajout('INSERT INTO DECES (no_dept, date, deces) VALUES ('.$no_dept.',"'.$date.'",'.$donneapi->{'LiveDataByDepartement'}[0]->{'deces'}.')');

    //Remplissage de la table REANIMATION
    $bdd->ajout('INSERT INTO REANIMATION (no_dept, date, reanimation) VALUES ('.$no_dept.',"'.$date.'",'.$donneapi->{'LiveDataByDepartement'}[0]->{'reanimation'}.')');
}
?>