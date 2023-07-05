<?php
include('./connexion.php');

if (isset($_POST)) {
    if (isset($_POST['dateHour']) && !empty($_POST['dateHour'])
        && isset($_POST['idPatients']) && !empty($_POST['idPatients'])
        && isset($_POST['id']) && !empty($_POST['id'])

) {
        $id = strip_tags($_GET['id']);
        $dateHour = strip_tags($_POST['dateHour']);
        $idPatients = strip_tags($_POST['idPatients']);


        $sql = "UPDATE appointments SET dateHour = :dateHour, idPatients = :idPatients WHERE id = :id";

        $query = $db->prepare($sql);

        $query->bindValue(':dateHour', $dateHour, PDO::PARAM_STR);
        $query->bindValue(':idPatients', $idPatients, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);

        $query->execute();

        header('Location: index.php');
    }
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM appointments WHERE id=:id;";
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
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
        <label for="dateHour">Date et heure :</label>
        <input type="datetime-local" name="dateHour">

        <label for="idPatients">Id patients :</label>
        <input type="text" name="idPatients">

        <button type="submit">Submit</button>
    </form>
</body>

</html>


