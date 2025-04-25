<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../controllers/controllers_produit_detail_recommandes.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" type="text/css" href="../Style/chat.css"> -->
  <link rel="stylesheet" type="text/css" href="../Style/style.css">
  <link rel="stylesheet" type="text/css" href="../Style/panier.css">
  <link rel="stylesheet" href="../style/style_indexE.css">

  <title>Tartaros</title>
    <title>Page Produit</title>
</head>

<body>

<header>
        <?php include("menu_principal.php"); ?>
    </header>

  

    <h2>Mon Panier</h2>

    <?php include '../controllers/controller_panier.php'; ?>

    <div class="section">
            <div class="section-title">Produits recommandés </div>
            <div class="product-container">
                <?php foreach ($dataToDisplay['produitsPopulaires'] as $row): ?>
                    <div class="product">
                            <input type="hidden" id="id" name="id" value="<?= $row['id']; ?>" required>
                            <h2 class="product-title"><?= $row['nom_produit'] ?></h2>
                            <img class="product-image" src="<?= $row['photo'] ?>" alt="Photo du produit">
                            <p><strong>Prix :</strong> <?= $row['prix'] ?>€</p>
                        </a>
 <button class="custom-btn btn-12"><a href="ajouter_panier.php?id=<?= $row['id']; ?>&nom=<?= $row['nom_produit']; ?>&prix=<?= $row['prix']; ?>"><span>Click!</span><span>Ajouter au panier</span></button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    
    <footer>
    <?php include("Footer.php"); ?>
  </footer>
    
</body>
</html>
