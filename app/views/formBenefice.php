<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bénéfice - Livraisons Pro</title>
    <link rel="stylesheet" href="/assets/header.css">
    <link rel="stylesheet" href="/assets/benefice.css">
    <link rel="stylesheet" href="/assets/footer.css">
</head>
<body>
    <?php include 'header.php' ?>

    <main class="benefice-main">
        <div class="benefice-card">
            <h1>Calcul du Bénéfice</h1>
            
            <form action="/benefice/filtre" method="POST" class="benefice-form">
                <div class="form-group">
                    <label for="jour">Jour</label>
                    <input type="number" name="jour" id="jour" min="1" max="31">
                </div>

                <div class="form-group">
                    <label for="mois">Mois</label>
                    <input type="number" name="mois" id="mois" min="1" max="12">
                </div>

                <div class="form-group">
                    <label for="annee">Année</label>
                    <input type="number" name="annee" id="annee">
                </div>

                <button type="submit" class="btn-submit">Filtrer</button>
            </form>

            <?php if (isset($resultat)) : ?>
            <div class="result-box">
                <h2>Le bénéfice total est : <span class="result-value"><?= htmlspecialchars($resultat) ?></span></h2>
            </div>
            <?php endif; ?>
        </div>
    </main>

    <?php include 'footer.php' ?>
</body>
</html>