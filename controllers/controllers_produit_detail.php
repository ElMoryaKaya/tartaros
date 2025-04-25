<?php
require_once("../models/Bd_connexion.php");
require_once("../models/models_produit_detail.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
   
    $productId = $_GET['id'];

    $productDetails = getDetailsProduit($productId);

} else {
    // Gérer l'absence de l'identifiant du produit
    echo "Identifiant du produit manquant.";
}
