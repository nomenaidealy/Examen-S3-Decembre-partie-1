<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Zones - Livraisons Pro</title>
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/zone.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
</head>
<body>
    <?php include 'header.php' ?>

    <main class="zone-container">
        <div class="zone-header">
            <h1>Liste des Zones</h1>
            <a href="/zone/formAjout" class="btn-add-zone">Ajouter Zone</a>
            <p>Gérez les zones de livraison</p>
        </div>

        <div class="table-wrapper">
            <table class="zone-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Pourcentage</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $zone): ?>
                    <tr class="zone-row">
                        <td data-label="Nom" class="name-cell">
                            <span class="zone-badge"><?= htmlspecialchars($zone['nom']) ?></span>
                        </td>
                        <td data-label="Pourcentage" class="percentage-cell">
                            <span class="percentage-badge"><?= $zone['pourcentage'] ?>%</span>
                        </td>
                        <td class="action-cell">
                            <a href="/zone/editForm/<?= $zone['id'] ?>" class="btn-edit" title="Modifier">✏️</a>
                            <a href="/zone/delete/<?= $zone['id'] ?>" class="btn-delete" title="Supprimer" onclick="return confirm('Êtes-vous sûr?')">🗑️</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php include 'footer.php' ?>
</body>
</html>