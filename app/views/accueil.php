<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des livraisons</h1>
    <table border="1">
            <tr>
                <th>Colis</th>
                <th>poids</th>
                <th>depart</th>
                <th>destination</th>
                <th>date_livraison</th>
                <th>statut</th>
                <th>vehicule</th>
                <th>chauffeur</th>
                <th>cout_vehicule</th>
                <th>salaire</th>
                <th>chiffre_affaire</th>
                <th>cout_revient</th>
            </tr>
    
             <?php foreach ($data as $l): ?>
            <tr>
                <td><?= htmlspecialchars($l['colis']) ?></td>
                <td><?= $l['poids'] ?></td>
                <td><?= $l['depart'] ?></td>
                <td><?= htmlspecialchars($l['destination']) ?></td>
                <td><?= htmlspecialchars($l['date_livraison']) ?></td>
                <td><?= htmlspecialchars($l['statut']) ?></td>
                <td><?= htmlspecialchars($l['vehicule']) ?></td>
                <td><?= $l['chauffeur'] ?></td>
                <td><?= htmlspecialchars($l['cout_vehicule']) ?></td>
                <td><?= $l['salaire'] ?></td>
                <td ><?= $l['chiffre_affaire'] ?></td>
                <td><?= $l['cout_revient'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>


