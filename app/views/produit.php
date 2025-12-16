<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit - E-commerce</title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="/" class="logo">E-Varotra</a>
                <ul class="menu">
                    <li><a href="/">Accueil</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="product-detail container" style="margin-top:80px;">
            <div class="product-image">
                <img src="/assets/images/<?php echo htmlspecialchars($produit['image'] ?? 'placeholder.png'); ?>"
                     alt="<?php echo htmlspecialchars($produit['nom'] ?? 'Produit'); ?>"
                     style="max-width:300px;width:100%;height:auto;border-radius:8px;">
            </div>
            <div class="info" style="padding:16px;">
                <h1><?php echo htmlspecialchars($produit['nom'] ?? 'Produit inconnu'); ?></h1>
                <p><?php echo nl2br(htmlspecialchars($produit['description'] ?? 'Description indisponible.')); ?></p>
                <p><strong>Prix :</strong> <?php echo htmlspecialchars($produit['prix'] ?? 'N/A'); ?></p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 E-Varotra</p>
    </footer>
</body>
</html>