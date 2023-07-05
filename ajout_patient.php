<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];


    $sql = "INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES (:lastname, :firstname, :birthdate, :phone, :mail);";

    $query = $db->prepare($sql);

    $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
    $query->bindValue(':phone', $phone, PDO::PARAM_STR);
    $query->bindValue(':mail', $mail, PDO::PARAM_STR);

    $query->execute();
    $_SESSION['message'] = "Patient ajouté avec succès !";
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout patient</title>
</head>

<body>
    <h1>Ajoutez un patient ICI :</h1>
    <form method="post">
        <label for="lastname">Nom de famille :</label>
        <input type="text" name="lastname">

        <label for="fistname">Prénom :</label>
        <input type="text" name="firstname">

        <label for="birthdate">Date de naissance :</label>
        <input type="date" name="birthdate">

        <label for="phone">N° de téléphone :</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" required>

        <label for="mail">Mail :</label>
        <input type="text" name="mail">
        <button>Enregistrer</button>
    </form>

    <p>Voici la liste des patients : <a href="./liste_patients.php">ICI</a></p>
    <p>Ajouter un rendez-vous <a href="./add_appointments.php">ICI</a></p>
    <p>Voici la liste des RDV : <a href="./liste_rdv.php">ICI</a></p>


</body>

</html>
