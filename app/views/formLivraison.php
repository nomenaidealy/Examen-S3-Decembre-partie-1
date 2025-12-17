<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Livraison - Livraisons Pro</title>
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
                
                <!-- SECTION 1: Sélection du Colis -->
                <div class="form-section">
                    <h3 class="section-title">📦 Colis à Livrer</h3>
                    <div class="form-group">
                        <label for="idColis" class="form-label">
                            <span class="label-icon">📋</span>
                            Sélectionner un Colis
                        </label>
                        <select 
                            id="idColis"
                            name="idColis" 
                            class="form-select"
                            required
                        >
                            <option value="">-- Sélectionner un colis --</option>
                            <?php foreach ($colis as $c): ?>
                            <option value="<?= $c['id'] ?>">
                            <?= htmlspecialchars($c['description']) ?> (<?= $c['poids'] ?> kg)
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- SECTION 2: Adresse de Destination -->
                <div class="form-section">
                    <h3 class="section-title">📍 Destination</h3>
                    <div class="form-group">
                        <label for="adresse_destination" class="form-label">
                            <span class="label-icon">🏠</span>
                            Adresse de Destination
                        </label>
                        <input 
                            type="text" 
                            id="adresse_destination"
                            name="adresse_destination" 
                            class="form-input"
                            placeholder="Ex: 123 Rue de Paris, 75000 Paris"
                            required
                        >
                        <small class="form-help">Entrez l'adresse complète de livraison</small>
                    </div>

                    <div class="form-group">
                        <label for="date_livraison" class="form-label">
                            <span class="label-icon">📅</span>
                            Date de Livraison
                        </label>
                        <input 
                            type="date" 
                            id="date_livraison"
                            name="date_livraison" 
                            class="form-input"
                            required
                        >
                        <small class="form-help">Sélectionnez la date prévue de livraison</small>
                    </div>
                </div>

                <!-- SECTION 3: Véhicule et Chauffeur -->
                <div class="form-section">
                    <h3 class="section-title">🚗 Véhicule & Chauffeur</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="idVehicule" class="form-label">
                                <span class="label-icon">🚙</span>
                                Véhicule
                            </label>
                            <select 
                                id="idVehicule"
                                name="idVehicule" 
                                class="form-select"
                                required
                            >
                                <option value="">-- Sélectionner un véhicule --</option>
                                <?php foreach ($vehicules as $v): ?>
                                <option value="<?= $v['id'] ?>">
                                    <?= htmlspecialchars($v['numero_immatriculation']) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="idChauffeur" class="form-label">
                                <span class="label-icon">👤</span>
                                Chauffeur
                            </label>
                            <select 
                                id="idChauffeur"
                                name="idChauffeur" 
                                class="form-select"
                                required
                            >
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

                <!-- SECTION 4: Coûts -->
                <div class="form-section">
                    <h3 class="section-title">💰 Coûts</h3>
                    <div class="form-group">
                        <label for="cout_vehicule" class="form-label">
                            <span class="label-icon">💵</span>
                            Coût d'Utilisation du Véhicule
                        </label>
                        <div class="input-group">
                            <span class="currency-symbol">$</span>
                            <input 
                                type="number" 
                                step="0.01" 
                                id="cout_vehicule"
                                name="cout_vehicule" 
                                class="form-input"
                                placeholder="0.00"
                                required
                            >
                        </div>
                        <small class="form-help">Entrez le coût en dollars</small>
                    </div>
                </div>

                <!-- FORM ACTIONS -->
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <span class="btn-icon">✅</span>
                        Enregistrer la Livraison
                    </button>
                    <a href="/livraison/list" class="btn-cancel">
                        <span class="btn-icon">❌</span>
                        Annuler
                    </a>
                </div>

                <!-- INFO MESSAGE -->
                <div class="form-info">
                    <div class="info-box">
                        <h4>💡 Information</h4>
                        <p>Tous les champs marqués avec <span class="required">*</span> sont obligatoires pour créer une livraison.</p>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <?php include 'footer.php' ?>
</body>
</html>