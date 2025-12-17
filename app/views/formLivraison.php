<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une livraison</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f8;
        }

        .container {
            width: 420px;
            margin: 50px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #222;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background-color: #000;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Nouvelle livraison</h2>

    <form action="/livraison/store" method="POST">

        <!-- COLIS -->
        <label>Colis</label>
        <select name="idColis" required>
            <option value="">-- Sélectionner un colis --</option>
            <?php foreach ($colis as $c): ?>
                <option value="<?= $c['id'] ?>">
                    #<?= $c['id'] ?> - <?= htmlspecialchars($c['description']) ?> (<?= $c['poids'] ?> kg)
                </option>
            <?php endforeach; ?>
        </select>

        <!-- DESTINATION -->
        <label>Adresse de destination</label>
        <input type="text" name="adresse_destination" required>

        <!-- DATE -->
        <label>Date de livraison</label>
        <input type="date" name="date_livraison" required>

        <!-- VEHICULE -->
        <label>Véhicule</label>
        <select name="idVehicule" required>
            <option value="">-- Sélectionner un véhicule --</option>
            <?php foreach ($vehicules as $v): ?>
                <option value="<?= $v['id'] ?>">
                    <?= htmlspecialchars($v['numero_immatriculation']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- CHAUFFEUR -->
        <label>Chauffeur</label>
        <select name="idChauffeur" required>
            <option value="">-- Sélectionner un chauffeur --</option>
            <?php foreach ($chauffeurs as $ch): ?>
                <option value="<?= $ch['id'] ?>">
                    <?= htmlspecialchars($ch['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- COUT VEHICULE -->
        <label>Coût d'utilisation du véhicule</label>
        <input type="number" step="0.01" name="cout_vehicule" required>

        <button type="submit">Enregistrer la livraison</button>
    </form>
</div>

</body>
</html>
