<?php
try {
    //$objPdo = new PDO ('mysql:host=devbdd.iutmetz.univ-lorraine.fr;port=3306;dbname=wurtz35u_projetTut',  'wurtz35u_appli', '31904442' );
    $dbConnection = mysqli_connect('devbdd.iutmetz.univ-lorraine.fr', 'wurtz35u_appli', '31904442', 'wurtz35u_projetTut','3306');
} catch(Exception $exception ) {
    die($exception->getMessage());
}
