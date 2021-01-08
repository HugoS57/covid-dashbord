<?php
set_time_limit(0);
//Appelle du fichier connexion bdd
session_start();
require_once('connexion.php');

//Pour les département de 1 à 95;
for ($i = 1; $i <= 95; $i++) {
    $query = $dbConnection->prepare('SELECT nom_dept FROM DEPARTEMENT WHERE no_dept=?');
    $query->bind_param('i', $i);
    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_assoc()) {
        $result1 = $row['nom_dept'];
    }
    $result1 = utf8_encode($result1);
    // Création d'une nouvelle ressource cURL
    $ch = curl_init("https://coronavirusapi-france.now.sh/LiveDataByDepartement?Departement=" . $result1);
    $fp = fopen("example_homepage.txt", "w");

    //Enleve erreur certificat SSL
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Récupération de l'URL et affichage sur le navigateur
    $var1 = curl_exec($ch);

    //SI ERREUR
    if (curl_error($ch)) {
        fwrite($fp, curl_error($ch));
    }

    // Fermeture de la session cURL
    curl_close($ch);
    fclose($fp);

    $var1 = json_decode($var1);

    $date = $var1->{'LiveDataByDepartement'}[0]->{'date'};

    //Remplissage de la table GUERIS
    $query = $dbConnection->prepare('INSERT INTO GUERIS (no_dept, date, gueris) VALUES (?,?,?)');
    $query->bind_param('isi', $i, $date, $var1->{'LiveDataByDepartement'}[0]->{'gueris'});
    $query->execute();

    //Remplissage de la table HOSPITALISATION
    $query = $dbConnection->prepare('INSERT INTO HOSPITALISATION (no_dept, date, hospitalisation) VALUES (?,?,?)');
    $query->bind_param('isi', $i, $date, $var1->{'LiveDataByDepartement'}[0]->{'hospitalises'});
    $query->execute();

    //Remplissage de la table DECES
    $query = $dbConnection->prepare('INSERT INTO DECES (no_dept, date, deces) VALUES (?,?,?)');
    $query->bind_param('isi', $i, $date, $var1->{'LiveDataByDepartement'}[0]->{'deces'});
    $query->execute();

    //Remplissage de la table REANIMATION
    $query = $dbConnection->prepare('INSERT INTO REANIMATION (no_dept, date, reanimation) VALUES (?,?,?)');
    $query->bind_param('isi', $i, $date, $var1->{'LiveDataByDepartement'}[0]->{'reanimation'});
    $query->execute();
    //var_dump($var1);
}

for ($i = 971; $i <= 974; $i++) {
    $query = $dbConnection->prepare('SELECT nom_dept FROM DEPARTEMENT WHERE no_dept=?');
    $query->bind_param('i', $i);
    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_assoc()) {
        $result1 = $row['nom_dept'];
    }
    $result1 = utf8_encode($result1);
    // Création d'une nouvelle ressource cURL
    $ch = curl_init("https://coronavirusapi-france.now.sh/LiveDataByDepartement?Departement=" . $result1);
    $fp = fopen("example_homepage.txt", "w");

    //Enleve erreur certificat SSL
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Récupération de l'URL et affichage sur le navigateur
    $var1 = curl_exec($ch);

    //SI ERREUR
    if (curl_error($ch)) {
        fwrite($fp, curl_error($ch));
    }

    // Fermeture de la session cURL
    curl_close($ch);
    fclose($fp);

    $var1 = json_decode($var1);

    $date = $var1->{'LiveDataByDepartement'}[0]->{'date'};

    //Remplissage de la table GUERIS
    $query = $dbConnection->prepare('INSERT INTO GUERIS (no_dept, date, gueris) VALUES (?,?,?)');
    $query->bind_param('isi', $i, $date, $var1->{'LiveDataByDepartement'}[0]->{'gueris'});
    $query->execute();

    //Remplissage de la table HOSPITALISATION
    $query = $dbConnection->prepare('INSERT INTO HOSPITALISATION (no_dept, date, hospitalisation) VALUES (?,?,?)');
    $query->bind_param('isi', $i, $date, $var1->{'LiveDataByDepartement'}[0]->{'hospitalises'});
    $query->execute();

    //Remplissage de la table DECES
    $query = $dbConnection->prepare('INSERT INTO DECES (no_dept, date, deces) VALUES (?,?,?)');
    $query->bind_param('isi', $i, $date, $var1->{'LiveDataByDepartement'}[0]->{'deces'});
    $query->execute();

    //Remplissage de la table REANIMATION
    $query = $dbConnection->prepare('INSERT INTO REANIMATION (no_dept, date, reanimation) VALUES (?,?,?)');
    $query->bind_param('isi', $i, $date, $var1->{'LiveDataByDepartement'}[0]->{'reanimation'});
    $query->execute();
}

//Pour les département de 1 à 95;
$i = 976;
$query = $dbConnection->prepare('SELECT nom_dept FROM DEPARTEMENT WHERE no_dept=?');
$query->bind_param('i', $i);
$query->execute();
$result = $query->get_result();
while ($row = $result->fetch_assoc()) {
    $result1 = $row['nom_dept'];
}
$result1 = utf8_encode($result1);
// Création d'une nouvelle ressource cURL
$ch = curl_init("https://coronavirusapi-france.now.sh/LiveDataByDepartement?Departement=" . $result1);
$fp = fopen("example_homepage.txt", "w");

//Enleve erreur certificat SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Récupération de l'URL et affichage sur le navigateur
$var1 = curl_exec($ch);

//SI ERREUR
if (curl_error($ch)) {
    fwrite($fp, curl_error($ch));
}

// Fermeture de la session cURL
curl_close($ch);
fclose($fp);

$var1 = json_decode($var1);

$date = $var1->{'LiveDataByDepartement'}[0]->{'date'};

//Remplissage de la table GUERIS
$query = $dbConnection->prepare('INSERT INTO GUERIS (no_dept, date, gueris) VALUES (?,?,?)');
$query->bind_param('isi', $i, $date, $var1->{'LiveDataByDepartement'}[0]->{'gueris'});
$query->execute();

//Remplissage de la table HOSPITALISATION
$query = $dbConnection->prepare('INSERT INTO HOSPITALISATION (no_dept, date, hospitalisation) VALUES (?,?,?)');
$query->bind_param('isi', $i, $date, $var1->{'LiveDataByDepartement'}[0]->{'hospitalises'});
$query->execute();

//Remplissage de la table DECES
$query = $dbConnection->prepare('INSERT INTO DECES (no_dept, date, deces) VALUES (?,?,?)');
$query->bind_param('isi', $i, $date, $var1->{'LiveDataByDepartement'}[0]->{'deces'});
$query->execute();

//Remplissage de la table REANIMATION
$query = $dbConnection->prepare('INSERT INTO REANIMATION (no_dept, date, reanimation) VALUES (?,?,?)');
$query->bind_param('isi', $i, $date, $var1->{'LiveDataByDepartement'}[0]->{'reanimation'});
$query->execute();

?>