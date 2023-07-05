

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout RDV</title>
</head>

<body>
    <h1>Ajoutez un RDV ICI :</h1>
    <form method="post" action="./process/processAddAppointment.php">
        <label for="dateHour">Date et heure:</label>
        <input type="datetime-local" name="dateHour">

        <label for="idPatients"> ID du patient </label>
        <input type="text" name="idPatient">

        <button>Enregistrer</button>
    </form>
</body>

</html>