<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des colis</h1>
    <table border = "1">
        <tr>
            <th>poids</th>
            <th>description</th>
            <th>Status</th>
        </tr>
        <?php foreach($data as $c ) : ?>
        <tr>
            <td> <?= $c['poids'] ?></td>
            <td> <?= $c['description'] ?></td>
            <td><?= $c['statut']?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

      