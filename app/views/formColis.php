<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Colis - Livraisons Pro</title>

    <link rel="stylesheet" href="/assets/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/header.css">
    <link rel="stylesheet" href="/assets/formColis.css">
    <link rel="stylesheet" href="/assets/footer.css">
</head>
<body>

<?php include 'header.php' ?>

<main class="form-container">
    <div class="form-wrapper">

        <div class="form-header">
            <h1>Ajouter un Nouveau Colis</h1>
            <p>Remplissez les informations du colis à livrer</p>
        </div>

        <form action="/colis/ajout" method="POST" class="colis-form">

            <div class="form-group">
                <label for="description" class="form-label">
                    <i class="bi bi-pencil-square label-icon"></i>
                    Description du Colis
                </label>

                <input type="text" id="description" name="description"
                       class="form-input" required>

                <small class="form-help">Décrivez le contenu du colis</small>
            </div>

            <div class="form-group">
                <label for="poids" class="form-label">
                    <i class="bi bi-speedometer2 label-icon"></i>
                    Poids (kg)
                </label>

                <input type="number" id="poids" name="poids"
                       class="form-input" step="0.1" min="0" required>

                <small class="form-help">Entrez le poids en kilogrammes</small>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <i class="bi bi-plus-circle"></i>
                    Ajouter le Colis
                </button>

                <a href="/colis/list" class="btn-cancel">
                    <i class="bi bi-x-circle"></i>
                    Annuler
                </a>
            </div>

        </form>

        <div class="form-info">
            <div class="info-box">
                <h4>
                    <i class="bi bi-info-circle"></i>
                    Information
                </h4>
                <p>Les champs marqués avec <span class="required">*</span> sont obligatoires.</p>
            </div>
        </div>

    </div>
</main>

<?php include 'footer.php' ?>
</body>
</html>
