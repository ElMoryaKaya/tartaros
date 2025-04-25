
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require('../controllers/controller_simulation.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style_indexE.css">
    <link rel="stylesheet" href="../style/style_Produit.css"> 
    <link rel="stylesheet" href="../style/style_panier.css">
    <style>
            .pagination {
                text-align: center;
            }

            .pagination a {
                display: inline-block;
                margin: 0 5px; /* Marge entre les éléments de la pagination */
                padding: 5px 10px;
                border: 1px solid #007BFF;
                text-decoration: none;
                color: #007BFF;
            }

            .pagination a.active {
                background-color: #007BFF;
                color: #ffffff;
                font-weight: bold;
                border: 1px solid #007BFF;
                padding: 5px 10px;
            }
        </style>
    <!-- Ajout du style pour les produits -->
    <title>SIMULATION</title>
</head>


<body>
    <header>
        <?php include("views_Panier.php"); ?>   
        <?php include("menu_principal.php"); ?>
    </header>
    <!-- Section "Produits Populaires" -->
    <div class="section">
        <div class="section-title">SIMULATION </div>
        <div class="product-container">
            <?php foreach ($resultat as $row): ?>
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
    <br>
    <div class="pagination">
        <?php
            // Bouton précédent
            if ($page > 1) {
                echo '<a href="?page=' . ($page - 1) . '">&laquo; Précédent</a> ';
            }

            // Affichage des numéros de page
            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = ($i === $page) ? 'active' : '';
                echo '<a href="?page=' . $i . '" class="' . $activeClass . '">' . $i . '</a> ';
            }

            // Bouton suivant
            if ($page < $totalPages) {
                echo '<a href="?page=' . ($page + 1) . '">Suivant &raquo;</a>';
            }
        ?>
    </div>
    
</body>
    <footer>
         <?php include("Footer.php"); ?>
  </footer>
</html>
