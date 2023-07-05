<?php
require_once('./connexion.php');

if (isset($_GET['id'])) {$patientId = $_GET['id']; 
    $request = $db->prepare('SELECT * FROM patients WHERE id = :id');
    $request->bindParam(':id', $patientId);    
    $request->execute();    
    $patient = $request->fetch();
}


if ($patient) {
    echo ('ID : '. $patient['id']. '<br>');
    echo ('Nom : '. $patient['lastname']. '<br>');
    echo ('Prénom : '. $patient['firstname']. '<br>');
    echo ('Birthdate : '. $patient['birthdate']. '<br>');
    echo ('Téléphone : '. $patient['phone']. '<br>');
    echo ('Email : '. $patient['mail']. '<br>');
    $rdvs = $db->query('SELECT * FROM appointments WHERE idPatients = '. $patientId);
    foreach ($rdvs as $rdv) {
        echo ("RDV : ". $rdv['dateHour']). '<br>';
    }
    echo ('<a href="./edit.php?id=' . $patient['id'] . '">Modifier le patient</a>'); //lien pour modifier le patien grâce à son id 

    }

?>