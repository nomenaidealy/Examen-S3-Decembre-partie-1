<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation de zone</title>
</head>
<body>
    <form action="zone/ajout" method= "POST">
        <label for="nom">Nom de zone</label>
        <input type="text" name="nom">
        <label for="pourcentage">Pourcentage</label>
        <input type="number" name="pourcentage">
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>