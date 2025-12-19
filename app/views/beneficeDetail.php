<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail des Bénéfices - Livraisons Pro</title>
    <link rel="stylesheet" href="/assets/header.css">
    <link rel="stylesheet" href="/assets/beneficeDetail.css">
    <link rel="stylesheet" href="/assets/footer.css">
    <link rel="stylesheet" href="/assets/bootstrap-icons/bootstrap-icons.css">
</head>
<body>
    <?php include 'header.php' ?>

    <main class="benefice-detail-container">
        <div class="benefice-detail-header">
            <h1>Détail des Bénéfices</h1>
            <p>Analyse complète des bénéfices par période</p>
        </div>

        <div class="table-wrapper">
            <table class="benefice-table">
                <thead>
                    <tr>
                        <th>Année</th>
                        <th>Mois</th>
                        <th>Jour</th>
                        <th>Dépense</th>
                        <th>Chiffre d'Affaire</th>
                        <th>Bénéfice</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $benefice): ?>
                    <tr class="benefice-row">
                        <td data-label="Année" class="year-cell"><?= $benefice['annee'] ?></td>
                        <td data-label="Mois" class="month-cell"><?= $benefice['mois'] ?></td>
                        <td data-label="Jour" class="day-cell"><?= $benefice['jour'] ?></td>
                        <td data-label="Dépense" class="expense-cell">
                            <span class="expense-value">$<?= htmlspecialchars($benefice['cout_revient']) ?></span>
                        </td>
                        <td data-label="CA" class="revenue-cell">
                            <span class="revenue-value">$<?= htmlspecialchars($benefice['chiffre_affaire']) ?></span>
                        </td>
                        <td data-label="Bénéfice" class="profit-cell">
                            <span class="profit-value">$<?= htmlspecialchars($benefice['benefice']) ?></span>
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