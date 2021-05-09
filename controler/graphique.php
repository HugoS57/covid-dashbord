<?php
        session_start();
        require_once('bddServeur.php');
        $bdd = new bddServeur();
        $sql_date = $bdd->query('SELECT date FROM HOSPITALISATION WHERE no_dept=57');
        $sql_hospi = $bdd->query('SELECT hospitalisation FROM HOSPITALISATION WHERE no_dept=57');
        $sql_gueris = $bdd->query('SELECT gueris FROM GUERIS WHERE no_dept=57');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>graphiques</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body>
<div style="width: 50% ">
    <canvas id="myChart"></canvas>
</div>
<script>
    //remplissage des données dans des tableaux
    var tab = <?php  echo json_encode($sql_date);?>;
    var hospi = <?php echo json_encode($sql_hospi);?>;
    var gueris = <?php echo json_encode($sql_gueris);?>;


    //graphique
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // le type de graphique
        type: 'line',
        data: {
            labels: tab,
            datasets: [{
                             label: 'Hospitalisation',
                             backgroundColor: 'transparent',
                             borderColor: 'rgb(255,99,132)',
                             data: hospi

                }]
        },
        options: {
        }
    });
</script>
</body>
</html>