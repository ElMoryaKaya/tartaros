<?php
// product_model.php
require_once("../models/Bd_connexion.php");

    function getDetailsProduit($productId) {
        
        $connexion = obtenirConnexionBd();
        
        $requete = 'SELECT
        produit.id,
        produit.nom_produit,
        produit.photo
    FROM
        produit
    WHERE produit.id = :id;';

    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
    $stmt->execute();



        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // models_achate_produits_photo.php
    function getClesDisponibles($productId) {
        $connexion = obtenirConnexionBd();

        $requete = '
            SELECT
                cles_activation.id,
                cles_activation.numero_cles
            FROM
                cles_activation
            WHERE 
                cles_activation.produit_ID = :id
                AND cles_activation.id NOT IN (SELECT cles_ID FROM cles_achat)
        ';

        $stmt = $connexion->prepare($requete);
        $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


