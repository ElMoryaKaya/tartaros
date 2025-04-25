<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // Assurez-vous d'appeler session_start() au début de chaque script qui utilise des sessions

    require_once("../models/Bd_connexion.php");
    require_once("../models/models_achate_produits_photo.php");

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        
        $productId = $_GET['id'];
        
        $productDetails = getDetailsProduit($productId);

        if (is_array($productDetails) && !empty($productDetails)) {
        
            $productId = $productDetails['id'];
            $productName = $productDetails['nom_produit'];
            $productPhoto = $productDetails['photo'];

            // Récupérer les clés disponibles pour le produit
            $clesDisponibles = getClesDisponibles($productId);

            // Stocker les informations du produit dans des variables de session
            $_SESSION['product_id'] = $productDetails['id'];
        
        } else {
            echo "Aucun détail de produit trouvé.";
        }

    } else {
        echo "Identifiant du produit manquant.";
    }

