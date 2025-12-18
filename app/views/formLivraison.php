<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Livraison - Livraisons Pro</title>

    <link rel="stylesheet" href="/assets/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/header.css">
    <link rel="stylesheet" href="/assets/formLivraison.css">
    <link rel="stylesheet" href="/assets/footer.css">
</head>
<body>

<?php include 'header.php' ?>

<main class="form-container">
    <div class="form-wrapper">

        <div class="form-header">
            <h1>Créer une Nouvelle Livraison</h1>
            <p>Configurez les détails de la livraison</p>
        </div>

        <form action="/livraison/store" method="POST" class="livraison-form">

            <!-- SECTION 1 -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="bi bi-box-seam"></i>
                    Colis à Livrer
                </h3>

                <div class="form-group">
                    <label for="idColis" class="form-label">
                        <i class="bi bi-card-list label-icon"></i>
                        Sélectionner un Colis
                    </label>

                    <select id="idColis" name="idColis" class="form-select" required>
                        <option value="">-- Sélectionner un colis --</option>
                        <?php foreach ($colis as $c): ?>
                            <option value="<?= $c['id'] ?>">
                                <?= htmlspecialchars($c['description']) ?> (<?= $c['poids'] ?> kg)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- SECTION 2 -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="bi bi-geo-alt"></i>
                    Destination
                </h3>

                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-house label-icon"></i>
                        Adresse de Destination
                    </label>

                    <input type="text" name="adresse_destination" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-calendar-event label-icon"></i>
                        Date de Livraison
                    </label>

                    <input type="date" name="date_livraison" class="form-input" required>
                </div>
            </div>

            <!-- SECTION 3 -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="bi bi-truck"></i>
                    Véhicule & Chauffeur
                </h3>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="bi bi-car-front label-icon"></i>
                            Véhicule
                        </label>

                        <select name="idVehicule" class="form-select" required>
                            <option value="">-- Sélectionner un véhicule --</option>
                            <?php foreach ($vehicules as $v): ?>
                                <option value="<?= $v['id'] ?>">
                                    <?= htmlspecialchars($v['numero_immatriculation']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="bi bi-person-badge label-icon"></i>
                            Chauffeur
                        </label>

                        <select name="idChauffeur" class="form-select" required>
                            <option value="">-- Sélectionner un chauffeur --</option>
                            <?php foreach ($livreurs as $ch): ?>
                                <option value="<?= $ch['id'] ?>">
                                    <?= htmlspecialchars($ch['nom']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- SECTION 4 -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="bi bi-cash-stack"></i>
                    Coûts
                </h3>

                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-currency-dollar label-icon"></i>
                        Coût du Véhicule
                    </label>

                    <input type="number" step="0.01" name="cout_vehicule" class="form-input" required>
                </div>
            </div>

            <!-- ACTIONS -->
            <div class="form-actions">
                <button class="btn-submit">
                    <i class="bi bi-check-circle"></i>
                    Enregistrer
                </button>

                <a href="/livraison/list" class="btn-cancel">
                    <i class="bi bi-x-circle"></i>
                    Annuler
                </a>
            </div>

            <!-- INFO -->
            <div class="form-info">
                <h4>
                    <i class="bi bi-info-circle"></i>
                    Information
                </h4>
                <p>Tous les champs sont obligatoires.</p>
            </div>

        </form>
    </div>
</main>

<?php include 'footer.php' ?>
</body>
</html>
