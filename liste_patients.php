<?php
require_once ('./connexion.php');

$request = $db->query('SELECT * FROM patients');
$patients = $request->fetchAll();

foreach ($patients as $patient):
    echo "Profile du patient n° ".'<a href="./profil_patient.php?id='.$patient['id'].'">'.$patient['id'].' '.$patient['firstname'].' '.$patient['lastname'].'</a><br>';
    
endforeach;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste patient</title>
</head>
<body>
<p>Ajouter un patient <a href="./ajout_patient.php">ICI</a></p>    
</body>
</html>