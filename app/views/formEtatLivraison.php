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
    <h1>Changer le statut de la livraison #<?= htmlspecialchars($idLivraison ?? '') ?></h1>

    <form action="/livraison/editStatut" method="post">
        <input type="hidden" name="idLivraison" value="<?= htmlspecialchars($idLivraison ?? '') ?>">

        <label for="idStatut">Nouveau statut :</label>
        <select name="idStatut" id="idStatut" required>
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

        <div style="margin-top:12px;">
            <button type="submit">Enregistrer</button>
            <a href="/livraison/list" style="margin-left:8px;">Annuler</a>
        </div>
    </form>
</body>
</html>