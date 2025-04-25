<?php
 require_once('../models/Bd_connexion.php');

    if (isset($produit_id)) {
        
        // Affichez le formulaire ici
        $produit_id = $_GET['id'];
        
        $connexion = obtenirConnexionBd();
       
        $produit = getProduitById($connexion, $produit_id);

        // Affichez le formulaire de modification avec les détails du produit
       
        include('../views/views_UPDATEGestion_produit.php');

    } else {
        echo "L'ID du produit n'est pas spécifié.";

    }
    
?>