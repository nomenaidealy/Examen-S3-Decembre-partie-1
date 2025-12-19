<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Zone - Livraisons Pro</title>
    <link rel="stylesheet" href="/assets/header.css">
    <link rel="stylesheet" href="/assets/editZone.css">
    <link rel="stylesheet" href="/assets/footer.css">
</head>
<body>
    <?php include 'header.php' ?>

    <main class="form-container">
        <div class="form-wrapper">
            <div class="form-header">
                <h1>Modifier une Zone</h1>
                <p>Mettez à jour les informations de la zone</p>
            </div>

            <form action="/zone/update" method="POST" class="zone-form">
                <div class="form-group">
                    <label for="nom" class="form-label">
                        <span class="label-icon">📍</span>
                        Nom de Zone
                    </label>
                    <input type="number" name="id" value="<?= htmlspecialchars($zone['id']) ?>" hidden>
                    <input  
                        type="text" 
                        id="nom"
                        name="nom" 
                        class="form-input"
                        value="<?= htmlspecialchars($zone['nom']) ?>"
                        required
                    >
                    <small class="form-help">Entrez le nom de la zone de livraison</small>
                </div>

                <div class="form-group">
                    <label for="pourcentage" class="form-label">
                        <span class="label-icon">📊</span>
                        Pourcentage
                    </label>
                    <div class="input-group">
                        <input 
                            type="number" 
                            id="pourcentage"
                            name="pourcentage" 
                            class="form-input"
                            placeholder="0"
                            min="0"
                            max="100"
                            step="0.1"
                            required
                            value="<?= htmlspecialchars($zone['pourcentage']) ?>"
                        >
                        <span class="input-suffix">%</span>
                    </div>
                    <small class="form-help">Entrez le pourcentage (0-100)</small>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <span class="btn-icon">💾</span>
                        Mettre à Jour
                    </button>
                    <a href="/zone/list" class="btn-cancel">
                        <span class="btn-icon">❌</span>
                        Annuler
                    </a>
                </div>
            </form>

            <div class="form-info">
                <div class="info-box">
                    <h4>💡 Information</h4>
                    <p>Tous les champs marqués avec <span class="required">*</span> sont obligatoires.</p>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php' ?>
</body>
</html>