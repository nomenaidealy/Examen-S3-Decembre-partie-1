<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des livraisons</title>
</head>
<body>
    <h1>Les listes de livraisons et leurs status</h1>
    <table border="1">
        <tr>
            <th>Colis</th>
            <th>Poids</th>
            <th>Prix/kg</th>
            <th>Livreur</th>
            <th>Véhicule</th>
            <th>Adresse départ</th>
            <th>Adresse destination</th>
            <th>Date</th>
            <th>Status</th>
            <th>Salaire</th>
            <th>Coût véhicule</th>
            <th>Coût revient</th>
            <th>Chiffre d'affaire</th>
        </tr>
        <?php foreach ($data as $l): ?>
        <tr>
            <td><?= htmlspecialchars($l['colis']) ?></td>
            <td><?= $l['poids'] ?></td>
            <td><?= $l['prix_par_kilos'] ?></td>
            <td><?= htmlspecialchars($l['livreur']) ?></td>
            <td><?= htmlspecialchars($l['vehicule']) ?></td>
            <td><?= htmlspecialchars($l['adresse_depart']) ?></td>
            <td><?= htmlspecialchars($l['adresse_destination']) ?></td>
            <td><?= $l['date_livraison'] ?></td>
            <td><?= htmlspecialchars($l['statut']) ?></td>
            <td><?= $l['salaire_chauffeur'] ?></td>
            <td><?= $l['cout_vehicule'] ?></td>
            <td><?= $l['cout_revient'] ?></td>
            <td><?= $l['chiffre_affaire'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

