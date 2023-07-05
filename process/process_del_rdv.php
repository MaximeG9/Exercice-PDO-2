<?php

require_once('../connexion.php');

if (!empty($_GET['id'])){
    $data = [
        ':id' => $_GET['id'],
    ];
    $sql = "DELETE FROM appointments WHERE id = :id";
    $query= $db->prepare($sql);
    $query->execute($data);
} 

header('Location:../liste_rdv.php');

?>