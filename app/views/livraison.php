<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livraisons - Livraisons Pro</title>
    <link rel="stylesheet" href="/assets/header.css">
    <link rel="stylesheet" href="/assets/livraison.css">
    <link rel="stylesheet" href="/assets/footer.css">
    <link rel="stylesheet" href="/assets/bootstrap-icons/bootstrap-icons.css">

</head>
<body>
    <?php include 'header.php' ?>

    <main class="livraison-container">
        <div class="livraison-header">
            <h1>Liste des Livraisons</h1>
            <p>Gestion complète de vos livraisons et performances</p>
            <a href="/livraison/form">Ajouter livraison</a>
            <a href="/livraison/supAll">Supprimer toute les livraison</a>
        </div>

        

        <div class="table-wrapper">
            <table class="livraison-table">
                <thead>
                    <tr>
                        <th>Colis</th>
                        <th>Poids</th>
                        <th>Départ</th>
                        <th>Destination</th>
                        <th>Date Livraison</th>
                        <th>Statut</th>
                        <th>Véhicule</th>
                        <th>Chauffeur</th>
                        <th>Coût Véhicule</th>
                        <th>Salaire</th>
                        <th>CA</th>
                        <th>Coût Revient</th>
                        <th>Zone</th>
                        <th>Pourcentage Zone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $l): ?>
                    <tr class="livraison-row">
                        <td data-label="Colis" class="colis-cell">
                            <span class="badge-colis"><?= htmlspecialchars($l['colis']) ?></span>
                        </td>
                        <td data-label="Poids" class="poids-cell">
                            <span class="badge-weight"><?= $l['poids'] ?> kg</span>
                        </td>
                        <td data-label="Départ" class="depart-cell"><?= $l['depart'] ?></td>
                        <td data-label="Destination" class="destination-cell"><?= htmlspecialchars($l['destination']) ?></td>
                        <td data-label="Date" class="date-cell"><?= htmlspecialchars($l['date_livraison']) ?></td>
                        <td data-label="Statut" class="status-cell">
                            <span class="badge-status status-<?= strtolower(str_replace(' ', '-', $l['statut'])) ?>">
                                <?= htmlspecialchars($l['statut']) ?>
                            </span>
                        </td>
                        <td data-label="Véhicule" class="vehicule-cell"><?= htmlspecialchars($l['vehicule']) ?></td>
                        <td data-label="Chauffeur" class="chauffeur-cell"><?= $l['chauffeur'] ?></td>
                        <td data-label="Coût Véhicule" class="cost-cell">
                            <span class="cost-value">$<?= htmlspecialchars($l['cout_vehicule']) ?></span>
                        </td>
                        <td data-label="Salaire" class="salary-cell">
                            <span class="salary-value">$<?= $l['salaire'] ?></span>
                        </td>
                        <td data-label="CA" class="revenue-cell">
                            <span class="revenue-value">$<?= $l['chiffre_affaire'] ?></span>
                        </td>
                        <td data-label="Coût Revient" class="cost-return-cell">
                            <span class="cost-return-value">$<?= $l['cout_revient'] ?></span>
                        </td>
                        <td data-label="CA" class="revenue-cell">
                            <span class="revenue-value"><?= $l['zone_livraison'] ?></span>
                        </td>
                        <td data-label="CA" class="revenue-cell">
                            <span class="revenue-value"><?= $l['pourcentage_zone'] ?></span>
                        </td>

                        <?php if (strtolower($l['statut']) !== 'livre') { ?>

                        <td data-label="Actions" class="actions-cell">
                            <a href="/livraison/formStatut/<?= $l['id_livraison'] ?>" 
                            class="btn-change-status" 
                            title="Changer le statut">
                                <i class="bi bi-arrow-repeat"></i> Changer statut
                            </a>
                        </td>     
                        <?php } ?>        
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </main>

    <?php include 'footer.php' ?>
</body>
</html>