<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Colis - Livraisons Pro</title>
    <link rel="stylesheet" href="/assets/header.css">
    <link rel="stylesheet" href="/assets/colis.css">
    <link rel="stylesheet" href="/assets/footer.css">
    <link rel="stylesheet" href="/assets/bootstrap-icons/bootstrap-icons.css">
</head>
<body>
    <?php include 'header.php' ?>

    <main class="colis-container">
        <div class="colis-header">
            <h1>Liste des Colis</h1>
            <a href="/colis/form">Ajouter colis</a>
            <p>Gérez et suivez tous vos colis</p>
        </div>

        <div class="table-wrapper">
            <table class="colis-table">
                <thead>
                    <tr>
                        <th>Poids</th>
                        <th>Description</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $c) : ?>
                    <tr class="colis-row">
                        <td data-label="Poids" class="poids-cell">
                            <span class="badge-weight"><?= $c['poids'] ?> kg</span>
                        </td>
                        <td data-label="Description" class="description-cell">
                            <?= htmlspecialchars($c['description']) ?>
                        </td>
                        <td data-label="Statut" class="status-cell">
                            <span class="badge-status status-<?= strtolower(str_replace(' ', '-', $c['statut'])) ?>">
                                <?= $c['statut'] ?>
                            </span>
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