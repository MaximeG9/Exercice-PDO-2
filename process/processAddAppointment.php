<?php
require_once("../connexion.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['dateHour']) && !empty($_POST['idPatient'])) {

        $dateHour = $_POST['dateHour'];
        $idPatient = $_POST['idPatient']; // Assuming you have a select input for selecting the patient ID

        $sql = "INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES (:dateHour, :idPatients);";

        $query = $db->prepare($sql);

        $query->bindValue(':dateHour', $dateHour, PDO::PARAM_STR);
        $query->bindValue(':idPatients', $idPatient, PDO::PARAM_INT);

        $query->execute();
        $_SESSION['message'] = "RDV ajouté avec succès !";
        header('Location: ../index.php');
    }
}
?>