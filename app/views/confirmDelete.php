<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmer la Suppression - Livraisons Pro</title>
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/confirm.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
</head>
<body>
    <?php include 'header.php' ?>

    <main class="confirm-container">
        <div class="confirm-wrapper">
            <div class="confirm-header">
                <h1>Confirmation de Suppression</h1>
                <p>Veuillez entrer le code de confirmation</p>
            </div>

            <?php if (isset($error)): ?>
            <div class="alert alert-error">
                <span class="alert-icon">⚠️</span>
                <span class="alert-message"><?= htmlspecialchars($error) ?></span>
            </div>
            <?php endif; ?>

            <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <span class="alert-icon">✅</span>
                <span class="alert-message"><?= htmlspecialchars($success) ?></span>
            </div>
            <?php endif; ?>

            <form action="/livraison/confirmDelete" method="POST" class="confirm-form">
                <div class="form-group">
                    <label for="code" class="form-label">
                        <span class="label-icon">🔐</span>
                        Code de Confirmation
                    </label>
                    <input 
                        type="number" 
                        id="code"
                        name="code" 
                        class="form-input"
                        placeholder="Entrez le code"
                        required
                    >
                    <small class="form-help">Entrez le code reçu pour confirmer la suppression</small>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-confirm">
                        <span class="btn-icon">✓</span>
                        Confirmer
                    </button>
                    <a href="/livraison/list" class="btn-cancel">
                        <span class="btn-icon">❌</span>
                        Annuler
                    </a>
                </div>
            </form>

            <div class="form-info">
                <div class="info-box">
                    <h4>⚠️ Important</h4>
                    <p>Cette action est <strong>définitive</strong>. Assurez-vous d'avoir le bon code avant de confirmer la suppression.</p>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php' ?>
</body>
</html>