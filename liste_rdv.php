<?php

// On inclut la connexion à la base
require_once('connexion.php');

// On écrit notre requête
$sql = 'SELECT * FROM `appointments`';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des RDV</title>
</head>
<body>

    <h1>Liste des RDV</h1>
        <p>Vous pouvez ajouter un rendez-vous <a href="./add_appointments.php">ICI</a></p>
        <?php
            foreach($result as $rdv){
        ?>
                <tr>
                    <td>Rendez-vous n° <?= $rdv['id'] ?></td>
                    <td>Date et heure du rendez-vous :<?= $rdv['dateHour'] ?></td>
                    <td>ID du patient :<?= $rdv['idPatients'] ?></td>
                    <td><a href="./edit_rdv.php?id=<?=$rdv['id']?>">ICI</a></td>
                    <td><a href="./process/process_del_rdv.php?id=<?=$rdv['id']?>"><button>DELETE</button></a></td>
                </tr>
                <br>
        <?php
            }
        ?>
    
</body>
</html>