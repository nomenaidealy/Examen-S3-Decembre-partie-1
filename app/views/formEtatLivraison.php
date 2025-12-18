<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Changer le statut - Livraison <?= htmlspecialchars($idLivraison ?? '') ?></title>
    <link rel="stylesheet" href="/assets/header.css">
    <link rel="stylesheet" href="/assets/status.css">
    <link rel="stylesheet" href="/assets/footer.css">
</head>
<body>
<?php include 'header.php' ?>
<div class="status-form-container">
    <div class="status-form-wrapper">
        <div class="status-form-header">
            <h1>Changer le statut de la livraison #<?= htmlspecialchars($idLivraison ?? '') ?></h1>
        </div>

        <form class="status-form" action="/livraison/editStatut" method="post">
            <input type="hidden" name="idLivraison" value="<?= htmlspecialchars($idLivraison ?? '') ?>">

            <div class="status-form-group">
                <label for="idStatut" class="status-form-label">Nouveau statut :</label>
                <select name="idStatut" id="idStatut" class="status-form-select" required>
                    <option value="">-- Sélectionnez --</option>
                    <?php foreach ($data as $k => $item): 
                        if (is_array($item)) {
                            $sid = $item['id'] ?? $item['Id'] ?? $k;
                            $label = $item['libelle'] ?? $item['label'] ?? ($item['name'] ?? $sid);
                        } else {
                            $sid = $k;
                            $label = $item;
                        }
                    ?>
                        <option value="<?= htmlspecialchars($sid) ?>"><?= htmlspecialchars($label) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="status-form-actions">
                <button type="submit" class="btn-save">Enregistrer</button>
                <a href="/livraison/list" class="btn-cancel">Annuler</a>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php' ?>
</body>
</html>
