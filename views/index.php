<?php
   if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }
    require_once("../controllers/controllers_afficherPageAccueil.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style_indexE.css">
    <link rel="stylesheet" href="../style/style_Produit.css"> <!-- Ajout du style pour les produits -->
    <link rel="stylesheet" href="../style/style_panier.css">
 
    <title>Votre Site de Vente</title>
</head>
<body>
    <header>
        <?php include("views_Panier.php"); ?>
        <?php include("menu_principal.php"); ?>
    </header>
   
    <!-- Section "Produits Populaires" -->
    <div class="section">
        <div class="section-title">Produits Populaires </div>
        <div class="product-container">
            <?php foreach ($dataToDisplay['produitsPopulaires'] as $row): ?>
                <div class="product">
                    <a href="../views/views_produit_detail.php?id=<?= $row['id']; ?>">
                        <input type="hidden" id="id" name="id" value="<?= $row['id']; ?>" required>
                        <h2 class="product-title"><?= $row['nom_produit'] ?></h2>
                        <img class="product-image" src="<?= $row['photo'] ?>" alt="Photo du produit">
                        <p><strong>Prix :</strong> <?= $row['prix'] ?>€</p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
   
    <!-- Section "Nouvelles Sorties" -->
    <div class="section">
        <div class="section-title">Nouvelles Sorties</div>
        <div class="product-container">
            <?php foreach  ($dataToDisplay['nouvellesSorties'] as $row): ?>
                <div class="product">
                    <a href="../views/views_produit_detail.php?id=<?= $row['id']; ?>">
                    <input type="hidden" id="id" name="id" value="<?= $row['id']; ?>" required>
                        <h2 class="product-title"><?= $row['nom_produit'] ?></h2>
                        <img class="product-image" src="<?= $row['photo'] ?>" alt="Photo du produit">
                        <p><strong>Prix :</strong> <?= $row['prix'] ?>€</p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
 
    <!-- Section "Offres Spéciales" -->
    <div class="section">
        <div class="section-title">Offres Spéciales</div>
        <div class="product-container">
            <?php foreach  ($dataToDisplay['offresSpeciales'] as $row): ?>
                <div class="product">
                    <a href="../views/views_produit_detail.php?id=<?= $row['id']; ?>">
                    <input type="hidden" id="id" name="id" value="<?= $row['id']; ?>" required>
                        <h2 class="product-title"><?= $row['nom_produit'] ?></h2>
                        <img class="product-image" src="<?= $row['photo'] ?>" alt="Photo du produit">
                        <p><strong>Prix :</strong> <?= $row['prix'] ?>€</p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
 
    <!-- Section "Meilleures Ventes" -->
    <div class="section">
        <div class="section-title">Meilleures Ventes</div>
        <div class="product-container">
            <?php foreach  ($dataToDisplay['meilleuresVentes'] as $row): ?>
                <div class="product">
                    <a href="../views/views_produit_detail.php?id=<?= $row['id']; ?>">
                    <input type="hidden" id="id" name="id" value="<?= $row['id']; ?>" required>
                        <h2 class="product-title"><?= $row['nom_produit'] ?></h2>
                        <img class="product-image" src="<?= $row['photo'] ?>" alt="Photo du produit">
                        <p><strong>Prix :</strong> <?= $row['prix'] ?>€</p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>
 