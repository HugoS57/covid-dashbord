<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>graphiques</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body>
<div style="width: 80% ">
    <canvas id="myChart"></canvas>
</div>
<?php
        session_start();
        require_once('bddServeur.php');
        $bdd = new bddServeur();
        $sql_date = $bdd->query('SELECT date FROM HOSPITALISATION WHERE no_dept=57');
        $sql_hospi = $bdd->query('SELECT hospitalisation FROM HOSPITALISATION WHERE no_dept=57');
        $sql_gueris = $bdd->query('SELECT gueris FROM GUERIS WHERE no_dept=57');

?>
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
            labels: [tab[0],tab[1],tab[2]],
            datasets: [{
                             label: 'Hospitalisation',
                             backgroundColor: 'transparent',
                             borderColor: 'rgb(255,99,132)',
                             data: [hospi[0], hospi[1], hospi[2]]
            },
                {
                            label: 'Gueris',
                            data: [gueris[0], gueris[1], gueris[2]],
                            backgroundColor: 'transparent',
                            borderColor:'rgba(0,255,255)',
                            borderWidth: 3
                }]
        },
        options: {

        }
    });
</script>
</body>
</html>