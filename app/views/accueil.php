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

+----+--------------+-------+----------------+--------------+----------+------------------+---------------------------+----------------+------------+-------------------+---------------+--------------+-----------------+
| id | colis        | poids | prix_par_kilos | livreur      | vehicule | adresse_depart   | adresse_destination       | date_livraison | statut     | salaire_chauffeur | cout_vehicule | cout_revient | chiffre_affaire |
+----+--------------+-------+----------------+--------------+----------+------------------+---------------------------+----------------+------------+-------------------+---------------+--------------+-----------------+
|  1 | Electronique | 10.00 |           5.00 | John Doe     | AB123CD  | Entrepot Central | 123 Rue Principale        | 2025-12-16     | en attente |             40.00 |         50.00 |        90.00 |           50.00 |
|  2 | Livres       | 20.00 |           2.50 | Jane Smith   | XY987ZT  | Entrepot Central | 456 Avenue du Parc        | 2025-12-16     | en attente |             50.00 |         30.00 |        80.00 |           50.00 |
|  3 | Vêtements    | 15.00 |           3.00 | Alice Dupont | ZZ999YY  | Entrepot Central | 789 Boulevard de la Ville | 2025-12-16     | en attente |             45.00 |         45.00 |        90.00 |           45.00 |
+----+--------------+-------+----------------+--------------+----------+------------------+---------------------------+----------------+------------+-------------------+---------------+--------------+-----------------+
3 rows in set (0,001 sec)

MariaDB [colis_express]> 

