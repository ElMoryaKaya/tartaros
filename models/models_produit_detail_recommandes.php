<?php
    require "../models/Bd_connexion.php";
        
    $connexion = obtenirConnexionBd();
   
    function getProduitsPopulaires($connexion) {
        $query = "SELECT id, nom_produit, photo, prix FROM produit ORDER BY RAND() LIMIT 16";
        $stmt = $connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }