    <?php
        // Démarrez la session
        session_start();

        require_once("../controllers/controllers_produit_detail.php");
        require_once("../controllers/controllers_produit_detail_recommandes.php");

    ?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/style_Produit.css">
        <link rel="stylesheet" href="../style/style_detail_produit.css">
        <link rel="stylesheet" href="../style/style_indexE.css">
        <title>Votre Site de Vente</title>
    </head>

    <body>
        <header>
            <?php include("menu_principal.php"); ?>
        </header>
        <br><br>
        <div class="product-containers">
            <div class="products">
                <div class="product-detailss">
                    <div class="product_details">
                        <div class="centre_nom" >
                            <h1><?= $productDetails['nom_produit']; ?></h1>
                        </div>
                        <img src="<?= $productDetails['photo']; ?>" alt="Photo du produit">
                        <div class ="productDetails_gras">
                            <p><strong>Type de produit :</strong> <?= $productDetails['type_produit']; ?></p>
                            <p><strong>Date de sortie :</strong> <?= $productDetails['date_sortie']; ?></p>
                            <p><strong>Prix :</strong> <?= $productDetails['prix']; ?>€</p>
                            <p><strong>Note :</strong> <?= $productDetails['note']; ?></p>
                            <p><strong>Type de jeux :</strong> <?= $productDetails['type_jeux']; ?></p>
                            <p><strong>Plateforme :</strong> <?= $productDetails['nom_console']; ?></p>
                        </div>
                    </div>
                    <div class="product-actionss">
                        <a href="ajouter_panier.php?id=<?= $productDetails['id']; ?>&nom=<?= $productDetails['nom_produit']; ?>&prix=<?= $productDetails['prix']; ?>">
                            Ajouter au panier
                        </a>
                        
                        <a href="../controllers/controllers_acheterController.php?id=<?= $productDetails['id']; ?>">
                                Acheter maintenant
                        </a>
                    </div>
                </div>
            </div>
        </div>
            <br>
             <!-- Section "Produits Populaires" -->
        <div class="section">
            <div class="section-title">Produits recommandés </div>
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
    </body>

    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>
