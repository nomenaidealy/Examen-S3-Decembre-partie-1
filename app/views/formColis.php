<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Colis - Livraisons Pro</title>
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
                        <span class="label-icon">📝</span>
                        Description du Colis
                    </label>
                    <input 
                        type="text" 
                        id="description"
                        name="description" 
                        class="form-input"
                        placeholder="Ex: Électronique, Documents, etc..."
                        required
                    >
                    <small class="form-help">Décrivez le contenu du colis</small>
                </div>

                <div class="form-group">
                    <label for="poids" class="form-label">
                        <span class="label-icon">⚖️</span>
                        Poids (kg)
                    </label>
                    <input 
                        type="number" 
                        id="poids"
                        name="poids" 
                        class="form-input"
                        placeholder="Ex: 2.5"
                        step="0.1"
                        min="0"
                        required
                    >
                    <small class="form-help">Entrez le poids en kilogrammes</small>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <span class="btn-icon">➕</span>
                        Ajouter le Colis
                    </button>
                    <a href="/colis/list" class="btn-cancel">
                        <span class="btn-icon">❌</span>
                        Annuler
                    </a>
                </div>
            </form>

            <div class="form-info">
                <div class="info-box">
                    <h4>💡 Information</h4>
                    <p>Les champs marqués avec <span class="required">*</span> sont obligatoires.</p>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php' ?>
</body>
</html>