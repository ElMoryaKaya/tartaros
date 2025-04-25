<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("../controllers/controllers_Select_EspaceGestion_Extension.php");
require("../controllers/controllers_redirection.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style_Produit.css">
    <link rel="stylesheet" href="../style/style_recherche.css">
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
    <title>Votre Site de Vente</title>
</head>
<body>
    <header>
        <?php include("menu_principal.php"); ?>
    </header>
    <?php include("buton_RetourOption.php") ?>
    <?php include("barre_rechercher.php") ?>

    <div class="product-container">
        <?php foreach ($resultat as $row): ?>
            <div class="product">
                <h2 class="product-title"><?= $row['nom_produit'] ?></h2>
                <img class="product-image" src="<?= $row['photo'] ?>" alt="Photo du produit">
                <div class="product-details">
                    <p><strong>Type de produit :</strong> <?= $row['type_produit'] ?></p>
                    <p><strong>Date de sortie :</strong> <?= $row['date_sortie'] ?></p>
                    <p><strong>Prix :</strong> <?= $row['prix'] ?></p>
                    <p><strong>Note :</strong> <?= $row['note'] ?></p>
                    <p><strong>Type de jeux :</strong> <?= $row['type_jeux'] ?></p>
                    <p><strong>Nom de la console :</strong> <?= $row['nom_console'] ?></p>
                    <p><strong>Numéro de clés :</strong> <?= $row['numero_cles'] ?></p>
                    <div class="product-actions">
                        <a href="../controllers/controllers_recuperationURL.php?id=<?= $row['id']; ?>">Modifier</a>
                        <a href="../controllers/controller_suppression_produit.php?id=<?= $row['id']; ?>">Supprimer</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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
            <br><br>
    <?php include('footer.php'); ?>
</body>
</html>
