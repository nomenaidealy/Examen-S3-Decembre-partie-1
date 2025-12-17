<?php 
$title = 'Liste des livraisons';
require_once 'header.php';
?>

<h2 >Liste des livraisons</h2>

<div >
    <table border="1" >
        <thead >
            <tr >
                <th>Colis</th>
                <th>Poids</th>
                <th>Prix/kg</th>
                <th>Livreur</th>
                <th>Véhicule</th>
                <th>Adresse départ</th>
                <th>Destination</th>
                <th>Date</th>
                <th>Status</th>
                <th>Salaire</th>
                <th>Coût véhicule</th>
                <th>Coût revient</th>
                <th>Chiffre d'affaire</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $l): ?>
            <tr>
                <td><?= htmlspecialchars($l['colis']) ?></td>
                <td><?= $l['poids'] ?></td>
                <td><?= $l['prix_par_kilos'] ?></td>
                <td><?= htmlspecialchars($l['livreur']) ?></td>
                <td><?= htmlspecialchars($l['vehicule']) ?></td>
                <td><?= htmlspecialchars($l['adresse_depart']) ?></td>
                <td><?= htmlspecialchars($l['adresse_destination']) ?></td>
                <td><?= $l['date_livraison'] ?></td>
                <td class="fw-bold text-primary"><?= htmlspecialchars($l['statut']) ?></td>
                <td><?= $l['salaire_chauffeur'] ?></td>
                <td><?= $l['cout_vehicule'] ?></td>
                <td><?= $l['cout_revient'] ?></td>
                <td ><?= $l['chiffre_affaire'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'footer.php'; ?>
