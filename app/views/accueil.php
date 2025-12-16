<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - E-commerce</title>
    <link rel="stylesheet" href="./assets/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="index.html" class="logo">E-Varotra</a>
                <ul class="menu">
                    <li><a href="index.html">Accueil</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <h1>Bienvenue sur notre boutique</h1>
        <section class="product-list">
            <?php foreach ($produits as $produit): ?>
            <article class="product-card">
                <a href="produit/<?php echo htmlspecialchars($produit['id']); ?>">
                    <img src="./assets/images/<?php echo htmlspecialchars($produit['image']); ?>" alt="<?php echo htmlspecialchars($produit['nom']); ?>">
                    <h2><?php echo htmlspecialchars($produit['nom']); ?></h2>
                    <p>Prix : <?php echo htmlspecialchars($produit['prix']); ?></p>
                </a>
            </article>
            <?php endforeach; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 E-Varotra</p>
    </footer>
</body>
</html>