<?php
include('./connexion.php');

if (isset($_POST)) {
    if (isset($_POST['lastname']) && !empty($_POST['lastname'])
        && isset($_POST['firstname']) && !empty($_POST['firstname'])
        && isset($_POST['birthdate']) && !empty($_POST['birthdate'])
        && isset($_POST['phone']) && !empty($_POST['phone'])
        && isset($_POST['mail']) && !empty($_POST['mail'])) {

        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $birthdate = $_POST['birthdate'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];

        $sql = "UPDATE patients SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail WHERE id = :id";
        $query = $db->prepare($sql);

        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
        $query->bindValue(':phone', $phone, PDO::PARAM_INT);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        // bind the :id parameter
        $id = $_GET['id'];
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        header('Location: index.php');
    }
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `patients` WHERE `id`=:id;";
    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit patient</title>
</head>

<body>
    <h1>Modifier le patient ICI :</h1>
    <form method="post">
        <label for="lastname">Nom de famille :</label>
        <input type="text" name="lastname">

        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname">

        <label for="birthdate">Date de naissance :</label>
        <input type="date" name="birthdate">

        <label for="phone">N° de téléphone :</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" required>

        <label for="mail">Mail :</label>
        <input type="text" name="mail">

        <button type="submit">Submit</button>
    </form>
</body>

</html>
